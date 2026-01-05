<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\UnverifyUser;
use App\Models\User;
use App\Models\UnverifyVendor;
use App\Models\Vendor;
use App\Models\Otp;
use App\Models\SniPrice;
use App\Models\State;
use App\Models\StockCol;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;


class AuthController extends Controller
{


    public function runExpiredUserNotify()
    {
        Artisan::call('notify:expired-users');  // Your command

        return response()->json([
            'status' => true,
            'message' => 'Expired user notification command executed successfully.'
        ]);
    }



  public function test(Request $req, $name)
{
    Log::info('API Hit: /test', ['name_param' => $name]);

    $stockInfo = Stock::where('stock_name', 'LIKE', '%' . $name . '%')->first();
    Log::info('Stock Info Lookup', ['stockInfo' => $stockInfo]);

    $json_data = file_get_contents("php://input");
    Log::info('Raw JSON from php://input', ['data' => $json_data]);

    $data = json_decode($json_data, true);
    Log::info('Decoded JSON Data', ['data_array' => $data]);

    if (json_last_error() !== JSON_ERROR_NONE) {
        Log::error('JSON Decode Error', ['error' => json_last_error_msg()]);
        return response()->json([
            'error' => 'Invalid JSON',
            'details' => json_last_error_msg()
        ], 400);
    }

    
 $name = $name ?? null;
    $exists = SniPrice::where('name', $name)->exists();

    if (!$exists) {
        $sniprice = new SniPrice();
        $sniprice->name = $name;
        $sniprice->save();
        Log::info('New SniPrice saved', ['name' => $name]);
    } else {
        Log::info('Duplicate SniPrice entry skipped', ['name' => $name]);
    }

    $stock = new StockCol();

    
    $time = Carbon::now()->setTimezone('Asia/Kolkata')->format('Y-m-d H:i:s');

    $stock->name        = $name ?? null;
    $stock->stock_id    = $stockInfo->id ?? null;
    $stock->ticker      = $data['ticker']   ?? null;
    $stock->exchange    = $data['exchange'] ?? null;
    $stock->interval_at = $data['interval'] ?? null;
    $stock->time        = $data['time']     ?? null;
    $stock->time_2      = $time;
    $stock->open        = $data['open']     ?? null;
    $stock->close       = $data['close']    ?? null;
    $stock->high        = $data['high']     ?? null;
    $stock->low         = $data['low']      ?? null;
    $stock->volume      = $data['volume']   ?? null;
    $stock->quote       = $data['quote']    ?? null;
    $stock->base        = $data['base']     ?? null;

 
    $stock->save();

    Log::info('Stock Data Saved Successfully', ['stock_id' => $stock->id]);

    return response()->json([
        'message' => 'Data saved successfully',
        'data' => $stock
    ]);
}



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string', 
            'type' => 'required|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 201,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $type = $request->type;
        $ipAddress = $request->ip();
        $otpCode = rand(100000, 999999);
        // $otpCode = 123456;
        $dateNow = now();

        if ($type == 3) {
         
            $vendorData = [
                'name' => $request->name,
                'business_name' => $request->business_name ?? null,
                'phone_no' => $request->phone,
                'email' => $request->email,
                'depot_id' => $request->depot_id ?? null,
                'state_id' => $request->state_id ?? null,
                'city_id' => $request->city_id ?? null,
                'gst_no' => $request->gst_no ?? null,
                'status' => 2,  
            ];

            $vendor = UnverifyVendor::create($vendorData);

            Otp::create([
                'name' => $vendor->name,
                'contact_no' => $vendor->phone_no,
                'email' => $vendor->email,
                'otp' => $otpCode,
                'ip' => $ipAddress,
                'is_active' => 1,
                'date' => $dateNow,
            ]);

            $this->sendSignupOtpViaMsg91($vendor->phone_no, $otpCode);

            return response()->json([
                'status' => 200,
                'message' => 'Vendor registered successfully. OTP sent.',
                'data' => $vendor,
                'otp' => $otpCode 
            ]);

        } else {

            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $type,
                'business_name' => $request->business_name ?? null,
                'city' => $request->city ?? null,
                'address' => $request->address ?? null,
                'gst_no' => $request->gst_no ?? null,
                'status' => 1, 
            ];

            $user = UnverifyUser::create($userData);

            Otp::create([
                'name' => $user->name,
                'contact_no' => $user->phone,
                'email' => $user->email,
                'otp' => $otpCode,
                'ip' => $ipAddress,
                'is_active' => 1,
                'date' => $dateNow,
            ]);
        $this->sendSignupOtpViaMsg91($user->phone, $otpCode);
            return response()->json([
                'status' => 200,
                'message' => 'User registered successfully. OTP sent.',
                'data' => $user,
            ]);
        }
    }

    private function sendSignupOtpViaMsg91($phone, $otp)
    {
      
        $authKey = env('MSG91_AUTH_KEY');
        $senderId = 'SNIGRP';
        $route = 4;
        $dltTemplateId = '1207175818752782129';

        if (empty($authKey)) {
            Log::error("MSG91 auth key is missing in .env");
            return [
                'success' => false,
                'error' => [
                    'phone' => $phone,
                    'message' => 'MSG91 auth key is not configured',
                    'status' => 500,
                ]
            ];
        }

        $formattedPhone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($formattedPhone) === 10) {
            $formattedPhone = '91' . $formattedPhone;
        } elseif (strlen($formattedPhone) !== 12 || strpos($formattedPhone, '91') !== 0) {
            Log::warning("Invalid phone number format: {$formattedPhone}");
            return [
                'success' => false,
                'error' => [
                    'phone' => $formattedPhone,
                    'message' => 'Invalid phone number format',
                    'status' => 400,
                ]
            ];
        }

        $otpFor = 'Signup';
        $templateContent = "Welcome To Shreenath Spices,\nYour OTP for Registration is ##var## . Valid for 10 Minutes Only.\nKeep it Confidential.\nRegards:\nShreenath Industries";

      $message = str_replace('##var##', $otp, $templateContent);


        $queryParams = [
            'authkey'    => $authKey,
            'mobiles'    => $formattedPhone,
            'message'    => $message,
            'sender'     => $senderId,
            'route'      => $route,
            'DLT_TE_ID'  => $dltTemplateId,
        ];

        try {
            $response = Http::get('http://api.msg91.com/api/sendhttp.php', $queryParams);
            $responseStatus = $response->status();
            $responseBody = trim($response->body());

            Log::info('MSG91 raw response', [
                'to' => substr($formattedPhone, 0, 4) . 'XXXX' . substr($formattedPhone, -4),
                'otp' => $otp,
                'status' => $responseStatus,
                'raw_body' => $responseBody,
            ]);

            // ✅ Check if it's a successful message ID
            if ($responseStatus == 200 && preg_match('/^[a-f0-9]{20}$/i', $responseBody)) {
                return [
                    'success' => true,
                    'message_id' => $responseBody,
                ];
            }

            // ❌ If not a valid message ID, treat as error
            $errorMessage = $responseBody;
            if (stripos($responseBody, 'authentication') !== false) {
                $errorMessage = 'Authentication failure';
            } elseif (stripos($responseBody, 'template') !== false) {
                $errorMessage = 'Invalid DLT template ID';
            }

            Log::warning("Failed to send OTP to {$formattedPhone}. Response: {$responseBody}");

            return [
                'success' => false,
                'error' => [
                    'phone' => $formattedPhone,
                    'message' => "Failed to send OTP: {$errorMessage}",
                    'status' => $responseStatus ?: 400,
                ]
            ];
        } catch (\Exception $e) {
            Log::error("Error sending OTP to {$formattedPhone}: {$e->getMessage()}");
            return [
                'success' => false,
                'error' => [
                    'phone' => $formattedPhone,
                    'message' => "Error sending OTP: {$e->getMessage()}",
                    'status' => 500,
                ]
            ];
        }

    }

    

//  public function verifyOtp(Request $request)
//     {
//         $request->validate([
//             'number'     => 'required|string',
//             'otp'        => 'required|numeric',
//             'type'       => 'required|in:1,2,3',
//             'device_id'  => 'required|string'
//         ]);

//         $otpRecord = Otp::where('contact_no', $request->number)
//                         ->where('otp', $request->otp)
//                         ->where('is_active', 1)
//                         ->first();

//         if (!$otpRecord) {
//             return response()->json([
//                 'status' => 201,
//                 'message' => 'Invalid OTP or number',
//             ], 400);
//         }

//         $otpRecord->delete();

//         $existingUser = User::where('device_id', $request->device_id)->first();

//         if ($existingUser) {
//             if ($request->type == 3) {
//                 $vendor = Vendor::create([
//                     'name'          => $existingUser->name,
//                     'business_name' => $existingUser->business_name,
//                     'phone_no'      => $request->number,
//                     'email'         => $existingUser->email,
//                     'gst_no'        => $existingUser->gst_no ?? '',
//                     'status'        => 1,
//                 ]);

//                 $existingUser->delete();
//             } else {
//                 // $existingUser->phone = $request->number;
//                 // $existingUser->save();
//             }
//         }

//         if ($request->type == 3) {
//             if (Vendor::where('phone_no', $request->number)->exists()) {
//                 return response()->json([
//                     'status' => 201,
//                     'message' => 'Vendor with this number already exists.',
//                 ], 409);
//             }

//             $unverified = UnverifyVendor::where('phone_no', $request->number)->first();

//             if (!$unverified) {
//                 return response()->json([
//                     'status' => 201,
//                     'message' => 'Vendor not found',
//                 ], 404);
//             }

//             $vendor = Vendor::create([
//                 'name'          => $unverified->name,
//                 'business_name' => $unverified->business_name,
//                 'phone_no'      => $unverified->phone_no,
//                 'email'         => $unverified->email,
//                 'depot_id'      => $unverified->depot_id,
//                 'state_id'      => $unverified->state_id,
//                 'city_id'       => $unverified->city_id,
//                 'gst_no'        => $unverified->gst_no ?? '',
//                 'status'        => 1,
//             ]);

//             $unverified->delete(); // Remove unverified record

//             $token = $vendor->createToken('auth')->plainTextToken;

//             return response()->json([
//                 'status' => 200,
//                 'message' => 'Vendor verified and registered successfully',
//                 'token' => $token,
//                 'user' => $vendor,
//             ]);
//         }

//         if (User::where('phone', $request->number)->exists()) {
//             return response()->json([
//                 'status' => 201,
//                 'message' => 'User with this number already exists.',
//             ], 409);
//         }

//         $unverified = UnverifyUser::where('phone', $request->number)->first();

//         if (!$unverified) {
//             return response()->json([
//                 'status' => 201,
//                 'message' => 'User not found',
//             ], 404);
//         }

//         $user = User::create([
//             'name'          => $unverified->name,
//             'email'         => $unverified->email,
//             'phone'         => $unverified->phone,
//             'type'          => $unverified->type,
//             'business_name' => $unverified->business_name,
//             'city'          => $unverified->city,
//             'address'       => $unverified->address,
//             'gst_no'        => $unverified->gst_no,
//             'device_id'     => $request->device_id,
//             'status'        => 1,
//         ]);

//         $unverified->delete();

//         $token = $user->createToken('auth')->plainTextToken;

//         return response()->json([
//             'status' => 200,
//             'message' => 'User verified and registered successfully',
//             'token' => $token,
//             'data' => $user,
//         ]);
//     }


public function verifyOtp(Request $request)
{
    $request->validate([
        'number'     => 'required|string',
        'otp'        => 'required|numeric',
        'type'       => 'required|in:1,2,3',
        'device_id'  => 'required|string'
    ]);

    if($request->type == 3) {
         $otpRecord = Otp::where('contact_no', $request->number)
                    ->where('otp', $request->otp)
                    ->where('is_active', 1)
                    ->first();

    if (!$otpRecord) {
        return response()->json([
            'status' => 201,
            'message' => 'Invalid OTP or number',
        ], 400);
    }

    $otpRecord->delete();

    $existingUser = User::where('device_id', $request->device_id)->whereNotNull('phone')->first();

    $unverifiedVendor = UnverifyVendor::where('phone_no', $request->number)
    ->orderBy('id','DESC')->first();


    if (!$unverifiedVendor) {
        return response()->json([
            'status' => 404,
            'message' => 'Vendor not found',
        ], 404);
    }

    $vendor = Vendor::where('phone_no', $request->number)->first();

    if ($vendor) {
        return response()->json([
            'status' => 404,
            'message' => 'Vendor already exists.',
        ], 404);
    }

    $vendor = Vendor::create([
            'name'          => $unverifiedVendor->name,
            'business_name' => $unverifiedVendor->business_name,
            'phone_no'      => $unverifiedVendor->phone_no,
            'email'         => $unverifiedVendor->email,
            'depot_id'      => $unverifiedVendor->depot_id,
            'state_id'      => $unverifiedVendor->state_id,
            'city_id'       => $unverifiedVendor->city_id,
            'gst_no'        => $unverifiedVendor->gst_no ?? '',
            'status'        => 2, 
            'device_id'     => $existingUser->device_id ?? null, 
            'fcm_token'     => $existingUser->fcm_token ?? null, 
        ]);

        $unverifiedVendor->delete();
        $existingUser->delete();


    return response()->json([
        'status' => 200,
        'message' => 'Vendor verified and registered successfully',
        // 'token' => $token,
        'data' => $vendor,
    ]);

    }else {

    $otpRecord = Otp::where('contact_no', $request->number)
                    ->where('otp', $request->otp)
                    ->where('is_active', 1)
                    ->first();

    if (!$otpRecord) {
        return response()->json([
            'status' => 201,
            'message' => 'Invalid OTP or number',
        ], 400);
    }

    $otpRecord->delete();

    $existingUser = User::where('device_id', $request->device_id)->whereNotNull('phone')->first();


    $unverifiedUser = UnverifyUser::where('phone', $request->number)->orderBy('id','DESC')->first();

    if (!$unverifiedUser) {
        return response()->json([
            'status' => 404,
            'message' => 'User not found',
        ], 404);
    }

     $existingUser->phone = $unverifiedUser->phone ?? '';
     $existingUser->email = $unverifiedUser->email ?? '';
     $existingUser->name = $unverifiedUser->name ?? '';
     $existingUser->type = $unverifiedUser->type ?? '';
     $existingUser->business_name = $unverifiedUser->business_name ?? '';
     $existingUser->city = $unverifiedUser->city ?? '';
     $existingUser->address = $unverifiedUser->address ?? '';
     $existingUser->gst_no = $unverifiedUser->gst_no ?? '';
    //  $existingUser->device_id = $unverifiedUser->device_id;
     $existingUser->status = 1;
     $token = $existingUser->createToken('auth')->plainTextToken;
     $existingUser->save();

    $unverifiedUser->delete();

    return response()->json([
        'status' => 200,
        'message' => 'User verified and registered successfully',
        'token' => $token,
        'data' => $existingUser,
    ]);
     }
}


    public function getAllStates()
    {
        $states = State::all();

        if ($states->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No states found',
                'data' => []
            ], 404);
        }

        $formatted = $states->map(function ($state) {
            return [
                'id' => $state->id,
                'state_name' => $state->state_name,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'States fetched successfully',
            'data' => $formatted
        ]);
    }


// ////////////////////////////////latest


// public function stockCol()
// {
//     $categories = StockCol::orderBy('name')
//         ->orderBy('time', 'ASC')
//         ->orderBy('id', 'ASC')
//         ->get();

//     $sniPrices = SniPrice::all()->keyBy('name');
//     $result = [];

//     foreach ($categories as $r) {
//         $r->time = Carbon::parse($r->time);
//     }

//     $today = Carbon::now()->toDateString();
//     $currentTime = Carbon::now()->setTimezone('Asia/Kolkata');
//     // return $currentTime->format('H:i');

//     // Filter today's records
//     $todayRecords = $categories->filter(function ($r) use ($today) {
//         return $r->time->toDateString() === $today;
//     });

//     // If no records today, fallback to most recent past date
//     if ($todayRecords->isEmpty()) {
//         $previousAvailableDates = $categories->pluck('time')->map(function ($item) {
//             return Carbon::parse($item)->toDateString();
//         })->unique()->sortDesc()->values();

//         $latestAvailableDate = $previousAvailableDates->first(function ($date) use ($today) {
//             return $date < $today;
//         });

//         if (!$latestAvailableDate) {
//             return response()->json([
//                 'status' => 200,
//                 'message' => 'No past records available',
//                 'data' => [],
//             ]);
//         }

//         $todayRecords = $categories->filter(function ($r) use ($latestAvailableDate) {
//             return $r->time->toDateString() === $latestAvailableDate;
//         });

//         $today = $latestAvailableDate;
//     }

//     $oneDayCloseMapping = [
//         'JEERA2' => 'JEERA2_1D',
//         'JEERA3' => 'JEERA3_1D',
//         'DHANIYA' => 'DHANIYA_1D',
//         'DHANIYA2' => 'DHANIYA2_1D',
//         'TURMERIC' => 'TURMERIC_1D',
//         'TURMERIC2' => 'TURMERIC2_1D',
//         'GUARGUM' => 'GUARGUM_1D',
//         'GUARGUM2' => 'GUARGUM2_1D',
//         'GUARSEED' => 'GUARSEED_1D',
//         'GUARSEED2' => 'GUARSEED2_1D',
//     ];

//     $yesterdayCloses = [];
//     $dCloseOutput = [];


//    foreach ($oneDayCloseMapping as $mainName => $refName) {
//         $records = $categories
//             ->where('name', $refName)
//             ->filter(function ($item) {
//                 return !empty($item->time_2); // skip null or empty time_2
//             })
//             ->sortBy(function ($item) {
//                 return Carbon::parse($item->time_2); // sort by time_2
//             })
//             ->values();

//         // No records? Continue to next
//         if ($records->isEmpty()) {
//             $dCloseOutput[$mainName] = null;
//             continue;
//         }

//         $todayRecord = $records->first(function ($r) use ($today) {
//             return Carbon::parse($r->time_2)->toDateString() === $today;
//         });

//         $yesterdayRecord = $records->filter(function ($r) use ($today) {
//             return Carbon::parse($r->time_2)->toDateString() < $today;
//         })->last();

//         $hasTodayDclose = $todayRecord !== null;

//         if ($hasTodayDclose) {
//             $dCloseOutput[$mainName] = floatval($todayRecord->close);
//         } else {
//             if ($currentTime->format('H:i') >= '17:00') {
//                 $dCloseOutput[$mainName] = null;
//             } else {
//                 $dCloseOutput[$mainName] = $yesterdayRecord ? floatval($yesterdayRecord->close) : null;
//             }
//         }
//     }
    
//     $groupedByName = $todayRecords->groupBy('name');
//     $allProducts = collect($oneDayCloseMapping)->keys();

//     foreach ($allProducts as $product) {
//     $productRecords = $groupedByName->has($product)
//         ? $groupedByName[$product]
//         : $categories->where('name', $product)->sortByDesc('time')->values();

//     $records = $productRecords->sortBy('time')->values();
       
//     $lastOpen = $records->last() ? floatval($records->last()->open) : null;
//     $maxHigh = $records->max('high');
//     $minLow = $records->min('low');
//     $lastRecord = $records->last();


//     $lastDate = Carbon::parse($lastRecord->time_2)->toDateString();

//     $recordsOnLastDate = $records->filter(function ($r) use ($lastDate) {
//         return Carbon::parse($r->time_2)->toDateString() === $lastDate;
//     });

//     $firstEntryOnLastDate = $recordsOnLastDate->sortBy('time')->first();

//     $firstRecordOfDay = $records->first();
    
//     $dayOpen = $firstRecordOfDay ? floatval($firstRecordOfDay->open) : null;

//     $previousCloseRecord = $categories->where('name', $product)
//         ->filter(function ($r) use ($today) {
//             return $r->time->toDateString() < $today;
//         })->last();

//     $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

//     $sniPrice = $sniPrices[$product]->price ?? null;
//     $sniCurrentPrice = $sniPrices[$product]->current_price ?? null;
//     $SniPriceDiff = $sniPrice && $sniCurrentPrice ? ($sniPrice - $sniCurrentPrice) : null;

//     $dPre = null;
//     if ($sniCurrentPrice !== null && $lastOpen !== null) {
//         $dPre = $sniCurrentPrice - $lastOpen;
//     }

//     $percentageChange = null;
//     if (isset($yesterdayCloses[$product]) && $yesterdayCloses[$product] > 0 && $lastRecord->close) {
//         $percentageChange = (($lastRecord->close - $yesterdayCloses[$product]) / $yesterdayCloses[$product]) * 100;
//     } elseif ($previousClose !== null && $previousClose > 0 && $lastRecord->close) {
//         $percentageChange = (($lastRecord->close - $previousClose) / $previousClose) * 100;
//     }

//     $marketCloseTime = Carbon::parse($today . ' 17:00:00');
//     $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
//         return $r->time->format('H:i') === '17:00';
//     });

//     $closeValue = $closeRecord ? floatval($closeRecord->close) : ($lastRecord->close ?? '');

//     if (
//         $lastRecord === null ||
//         !is_numeric($lastOpen) || $lastOpen == 0 ||
//         !is_numeric($closeValue) || $closeValue == 0 ||
//         !is_numeric($maxHigh) || !is_numeric($minLow) ||
//         empty($lastRecord->volume) ||
//         empty($lastRecord->high) ||
//         empty($lastRecord->low)
//     ) {
//         Log::info("Skipping $product due to invalid data: open=$lastOpen, close=$closeValue, high=$maxHigh, low=$minLow");
//         continue;
//     }

//     $result[] = [
//         'id' => $lastRecord->id ?? null,
//         'dClose' => $dCloseOutput[$product] ?? null,
//         'stock_id' => $lastRecord->stock_id ?? null,
//         'app_name' => $lastRecord->Stock->app_name ?? '',
//         'ticker' => $lastRecord->ticker ?? '',
//         'name' => $lastRecord->name ?? '',
//         'exchange' => $lastRecord->exchange ?? '',
//         'interval' => $lastRecord->interval_at ?? '',
//         'time' => $lastRecord->time ?? null,
//         'date' => $lastRecord->time_2 ?? null,
//         'open' => $lastOpen !== null ? number_format($lastOpen, 2, '.', '') : '',
//         'day_open' => $firstEntryOnLastDate->open !== null ? number_format($firstEntryOnLastDate->open, 2, '.', '') : '',
//         'close' => $closeValue !== '' ? number_format($closeValue, 2, '.', '') : '',
//         'current_price' => $lastOpen !== null ? number_format(floatval($lastOpen), 2, '.', '') : '',
//         'high' => $maxHigh ?? '',
//         'low' => $minLow ?? '',
//         'volume' => $lastRecord->volume ?? '',
//         'quote' => $lastRecord->quote ?? '',
//         'base' => $lastRecord->base ?? '',
//         'previous_close' => $yesterdayCloses[$product] ?? $previousClose ?? '',
//         'percentage_change_from_previous' => $percentageChange !== null
//             ? number_format($percentageChange, 2, '.', '') : '',
//         'd_pre' => $dPre ?? null,
//         'SniPriceDiff' => $SniPriceDiff ?? '',
//     ];
//  }

//     $result = collect($result)->unique('name')->values()->all();

//     return response()->json([
//         'status' => 200,
//         'message' => 'Latest stock entries with calculations (fallback to latest available if no data for today)',
//         'data' => $result,
//         'date_used' => $today
//     ]);
// }

// //////////////////////////////// Finetuned latest
// public function stockCol()
// {
//     $categories = StockCol::orderBy('name')
//         ->orderBy('time', 'ASC')
//         ->orderBy('id', 'ASC')
//         ->get();

//     $sniPrices = SniPrice::all()->keyBy('name');
//     $result = [];

//     foreach ($categories as $r) {
//         $r->time = Carbon::parse($r->time);
//     }

//     $today = Carbon::now()->toDateString();
//     $currentTime = Carbon::now()->setTimezone('Asia/Kolkata');

//     // Filter today's records
//     $todayRecords = $categories->filter(function ($r) use ($today) {
//         return $r->time->toDateString() === $today;
//     });

//     // If no records today, fallback to most recent past date
//     if ($todayRecords->isEmpty()) {
//         $previousAvailableDates = $categories->pluck('time')->map(function ($item) {
//             return Carbon::parse($item)->toDateString();
//         })->unique()->sortDesc()->values();

//         $latestAvailableDate = $previousAvailableDates->first(function ($date) use ($today) {
//             return $date < $today;
//         });

//         if (!$latestAvailableDate) {
//             return response()->json([
//                 'status' => 200,
//                 'message' => 'No past records available',
//                 'data' => [],
//             ]);
//         }

//         $todayRecords = $categories->filter(function ($r) use ($latestAvailableDate) {
//             return $r->time->toDateString() === $latestAvailableDate;
//         });

//         $today = $latestAvailableDate;
//     }

//     $oneDayCloseMapping = [
//         'JEERA2' => 'JEERA2_1D',
//         'JEERA3' => 'JEERA3_1D',
//         'DHANIYA' => 'DHANIYA_1D',
//         'DHANIYA2' => 'DHANIYA2_1D',
//         'TURMERIC' => 'TURMERIC_1D',
//         'TURMERIC2' => 'TURMERIC2_1D',
//         'GUARGUM' => 'GUARGUM_1D',
//         'GUARGUM2' => 'GUARGUM2_1D',
//         'GUARSEED' => 'GUARSEED_1D',
//         'GUARSEED2' => 'GUARSEED2_1D',
//     ];

//     $yesterdayCloses = [];
//     $dCloseOutput = [];

//     foreach ($oneDayCloseMapping as $mainName => $refName) {
//         $records = $categories
//             ->where('name', $refName)
//             ->filter(function ($item) {
//                 return !empty($item->time_2); // skip null or empty time_2
//             })
//             ->sortByDesc(function ($item) {
//                 return Carbon::parse($item->time_2); // sort by time_2 in descending order
//             })
//             ->values();

//         // No records? Continue to next
//         if ($records->isEmpty()) {
//             $dCloseOutput[$mainName] = null;
//             continue;
//         }

//         $todayRecord = $records->first(function ($r) use ($today) {
//             return Carbon::parse($r->time_2)->toDateString() === $today;
//         });

//         $yesterdayRecord = $records->filter(function ($r) use ($today) {
//             return Carbon::parse($r->time_2)->toDateString() < $today;
//         })->first(); // Changed to first() for descending order

//         $hasTodayDclose = $todayRecord !== null;

//         if ($hasTodayDclose) {
//             $dCloseOutput[$mainName] = floatval($todayRecord->close);
//         } else {
//             if ($currentTime->format('H:i') >= '17:00') {
//                 $dCloseOutput[$mainName] = null;
//             } else {
//                 $dCloseOutput[$mainName] = $yesterdayRecord ? floatval($yesterdayRecord->close) : null;
//             }
//         }
//     }

//     $groupedByName = $todayRecords->groupBy('name');
//     $allProducts = collect($oneDayCloseMapping)->keys();

//     foreach ($allProducts as $product) {
//         $productRecords = $groupedByName->has($product)
//             ? $groupedByName[$product]
//             : $categories->where('name', $product)->sortByDesc('time')->values();

//         $records = $productRecords->sortBy('time')->values();

//         $lastOpen = $records->last() ? floatval($records->last()->open) : null;
//         $maxHigh = $records->max('high');
//         $minLow = $records->min('low');
//         $lastRecord = $records->last();

//         $lastDate = Carbon::parse($lastRecord->time_2)->toDateString();

//         $recordsOnLastDate = $records->filter(function ($r) use ($lastDate) {
//             return Carbon::parse($r->time_2)->toDateString() === $lastDate;
//         });

//         $firstEntryOnLastDate = $recordsOnLastDate->sortBy('time')->first();

//         $firstRecordOfDay = $records->first();

//         $dayOpen = $firstRecordOfDay ? floatval($firstRecordOfDay->open) : null;

//         // Modified previousClose logic
//         $twoDaysAgo = Carbon::parse($today)->subDays(1)->toDateString();
//         $refName = $oneDayCloseMapping[$product] ?? $product;
//         $previousCloseRecord = $categories
//             ->where('name', $refName)
//             ->filter(function ($r) use ($today, $twoDaysAgo) {
//                 $recordDate = Carbon::parse($r->time_2)->toDateString();
//                 return $recordDate <= $twoDaysAgo; // Get records from two days ago or earlier
//             })
//             ->sortByDesc(function ($r) {
//                 return Carbon::parse($r->time_2); // Sort in descending order
//             })
//             ->first();

//         $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

//         $sniPrice = $sniPrices[$product]->price ?? null;
//         $sniCurrentPrice = $sniPrices[$product]->current_price ?? null;
//         $SniPriceDiff = $sniPrice && $sniCurrentPrice ? ($sniPrice - $sniCurrentPrice) : null;

//         $dPre = null;
//         if ($sniCurrentPrice !== null && $lastOpen !== null) {
//             $dPre = $sniCurrentPrice - $lastOpen;
//         }

//         // $percentageChange = null;
//         // if (isset($yesterdayCloses[$product]) && $yesterdayCloses[$product] > 0 && $lastRecord->close) {
//         //     $percentageChange = (($lastRecord->close - $yesterdayCloses[$product]) / $yesterdayCloses[$product]) * 100;
//         // } elseif ($previousClose !== null && $previousClose > 0 && $lastRecord->close) {
//         //     $percentageChange = (($lastRecord->close - $previousClose) / $previousClose) * 100;
//         // }

//         $percentageChange = null;
//         if ($previousClose !== null && $previousClose > 0 && $lastRecord && $lastRecord->close) {
//             $percentageChange = (($lastRecord->close - $previousClose) / $previousClose) * 100;
//         }

//         $marketCloseTime = Carbon::parse($today . ' 17:00:00');
//         $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
//             return $r->time->format('H:i') === '17:00';
//         });

//         $closeValue = $closeRecord ? floatval($closeRecord->close) : ($lastRecord->close ?? '');

//         if (
//             $lastRecord === null ||
//             !is_numeric($lastOpen) || $lastOpen == 0 ||
//             !is_numeric($closeValue) || $closeValue == 0 ||
//             !is_numeric($maxHigh) || !is_numeric($minLow) ||
//             empty($lastRecord->volume) ||
//             empty($lastRecord->high) ||
//             empty($lastRecord->low)
//         ) {
//             Log::info("Skipping $product due to invalid data: open=$lastOpen, close=$closeValue, high=$maxHigh, low=$minLow");
//             continue;
//         }

//         $result[] = [
//             'id' => $lastRecord->id ?? null,
//             'dClose' => $dCloseOutput[$product] ?? null,
//             'stock_id' => $lastRecord->stock_id ?? null,
//             'app_name' => $lastRecord->Stock->app_name ?? '',
//             'ticker' => $lastRecord->ticker ?? '',
//             'name' => $lastRecord->name ?? '',
//             'exchange' => $lastRecord->exchange ?? '',
//             'interval' => $lastRecord->interval_at ?? '',
//             'time' => $lastRecord->time ?? null,
//             'date' => $lastRecord->time_2 ?? null,
//             'open' => $lastOpen !== null ? number_format($lastOpen, 2, '.', '') : '',
//             'day_open' => $firstEntryOnLastDate->open !== null ? number_format($firstEntryOnLastDate->open, 2, '.', '') : '',
//             'close' => $closeValue !== '' ? number_format($closeValue, 2, '.', '') : '',
//             'current_price' => $lastOpen !== null ? number_format(floatval($lastOpen), 2, '.', '') : '',
//             'high' => $maxHigh ?? '',
//             'low' => $minLow ?? '',
//             'volume' => $lastRecord->volume ?? '',
//             'quote' => $lastRecord->quote ?? '',
//             'base' => $lastRecord->base ?? '',
//             'previous_close' => $previousClose !== null ? number_format($previousClose, 2, '.', '') : '',
//             'percentage_change_from_previous' => $percentageChange !== null
//                 ? number_format($percentageChange, 2, '.', '') : '',
//             'd_pre' => $dPre ?? null,
//             'SniPriceDiff' => $SniPriceDiff ?? '',
//         ];
//     }

//     $result = collect($result)->unique('name')->values()->all();

//     return response()->json([
//         'status' => 200,
//         'message' => 'Latest stock entries with calculations (fallback to latest available if no data for today)',
//         'data' => $result,
//         'date_used' => $today
//     ]);
// }

// //////////////////////////////// Change Name With Admin Latest
public function stockCol()
{
    $categories = StockCol::orderBy('name')
    ->orderBy('time', 'ASC')
    ->orderBy('id', 'ASC')
    ->get();

    foreach ($categories as $cat) {
        if ($cat->open === null || $cat->close === null) {
            $cat->delete(); // soft delete → deleted_at update
        }
    }

    $sniPrices = SniPrice::all()->keyBy('name');
    $result = [];

    foreach ($categories as $r) {
        $r->time = Carbon::parse($r->time);
    }

    $today = Carbon::now()->toDateString();
    $currentTime = Carbon::now()->setTimezone('Asia/Kolkata');

    // Filter today's records
    $todayRecords = $categories->filter(function ($r) use ($today) {
        return $r->time->toDateString() === $today;
    });

    // If no records today, fallback to most recent past date
    if ($todayRecords->isEmpty()) {
        $previousAvailableDates = $categories->pluck('time')->map(function ($item) {
            return Carbon::parse($item)->toDateString();
        })->unique()->sortDesc()->values();

        $latestAvailableDate = $previousAvailableDates->first(function ($date) use ($today) {
            return $date < $today;
        });

        if (!$latestAvailableDate) {
            return response()->json([
                'status' => 200,
                'message' => 'No past records available',
                'data' => [],
            ]);
        }

        $todayRecords = $categories->filter(function ($r) use ($latestAvailableDate) {
            return $r->time->toDateString() === $latestAvailableDate;
        });

        $today = $latestAvailableDate;
    }

    // $oneDayCloseMapping = [
    //     'JEERA2' => 'JEERA2_1D',
    //     'JEERA3' => 'JEERA3_1D',
    //     'DHANIYA' => 'DHANIYA_1D',
    //     'DHANIYA2' => 'DHANIYA2_1D',
    //     'TURMERIC' => 'TURMERIC_1D',
    //     'TURMERIC2' => 'TURMERIC2_1D',
    //     'GUARGUM' => 'GUARGUM_1D',
    //     'GUARGUM2' => 'GUARGUM2_1D',
    //     'GUARSEED' => 'GUARSEED_1D',
    //     'GUARSEED2' => 'GUARSEED2_1D',
    // ];


    // $oneDayCloseMapping = Stock::whereNotNull('stock_name')
    // ->whereNotNull('stock_1d_name')
    // ->whereNotNull('app_name')
    // ->orderBy('sq_number', 'asc')  
    // ->pluck('stock_1d_name', 'stock_name')
    // ->toArray();
    $oneDayCloseMapping = Stock::whereNotNull('stock_name')
    ->whereNotNull('stock_1d_name')
    ->whereNotNull('app_name')
    ->orderByRaw('CAST(sq_number AS UNSIGNED) ASC')
    ->pluck('stock_1d_name', 'stock_name')
    ->toArray();
    // return $oneDayCloseMapping;

    $yesterdayCloses = [];
    $dCloseOutput = [];

    foreach ($oneDayCloseMapping as $mainName => $refName) {
        $records = $categories
            ->where('name', $refName)
            ->filter(function ($item) {
                return !empty($item->time_2); // skip null or empty time_2
            })
            ->sortByDesc(function ($item) {
                return Carbon::parse($item->time_2); // sort by time_2 in descending order
            })
            ->values();

        // No records? Continue to next
        if ($records->isEmpty()) {
            $dCloseOutput[$mainName] = null;
            continue;
        }

        $todayRecord = $records->first(function ($r) use ($today) {
            return Carbon::parse($r->time_2)->toDateString() === $today;
        });

        $yesterdayRecord = $records->filter(function ($r) use ($today) {
            return Carbon::parse($r->time_2)->toDateString() < $today;
        })->first(); // Changed to first() for descending order

        $hasTodayDclose = $todayRecord !== null;

        if ($hasTodayDclose) {
            $dCloseOutput[$mainName] = floatval($todayRecord->close);
        } else {
            if ($currentTime->format('H:i') >= '17:00') {
                $dCloseOutput[$mainName] = null;
            } else {
                $dCloseOutput[$mainName] = $yesterdayRecord ? floatval($yesterdayRecord->close) : null;
            }
        }
    }

    $groupedByName = $todayRecords->groupBy('name');
    $allProducts = collect($oneDayCloseMapping)->keys();

    foreach ($allProducts as $product) {
        $productRecords = $groupedByName->has($product)
            ? $groupedByName[$product]
            : $categories->where('name', $product)->sortByDesc('time')->values();

        $records = $productRecords->sortBy('time')->values();

        $lastOpen = $records->last() ? floatval($records->last()->open) : null;
        $maxHigh = $records->max('high');
        $minLow = $records->min('low');
        $lastRecord = $records->last();

        $lastDate = Carbon::parse($lastRecord->time_2)->toDateString();

        $recordsOnLastDate = $records->filter(function ($r) use ($lastDate) {
            return Carbon::parse($r->time_2)->toDateString() === $lastDate;
        });

        $firstEntryOnLastDate = $recordsOnLastDate->sortBy('time')->first();

        $firstRecordOfDay = $records->first();

        $dayOpen = $firstRecordOfDay ? floatval($firstRecordOfDay->open) : null;

        // Modified previousClose logic
        $twoDaysAgo = Carbon::parse($today)->subDays(1)->toDateString();
        $refName = $oneDayCloseMapping[$product] ?? $product;
        $previousCloseRecord = $categories
            ->where('name', $refName)
            ->filter(function ($r) use ($today, $twoDaysAgo) {
                $recordDate = Carbon::parse($r->time_2)->toDateString();
                return $recordDate <= $twoDaysAgo; // Get records from two days ago or earlier
            })
            ->sortByDesc(function ($r) {
                return Carbon::parse($r->time_2); // Sort in descending order
            })
            ->first();

        $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

        $sniPrice = $sniPrices[$product]->price ?? null;
        $sniCurrentPrice = $sniPrices[$product]->current_price ?? null;
        $SniPriceDiff = $sniPrice && $sniCurrentPrice ? ($sniPrice - $sniCurrentPrice) : null;

        $dPre = null;

        // Check: $sniCurrentPrice must not be null AND greater than 0
        if ($sniCurrentPrice !== null && $sniCurrentPrice > 0 && $lastOpen !== null) {
            $dPre = $sniCurrentPrice - $lastOpen;
        } else {
            $dPre = null; // explicitly set null
        }

        // $percentageChange = null;
        // if (isset($yesterdayCloses[$product]) && $yesterdayCloses[$product] > 0 && $lastRecord->close) {
        //     $percentageChange = (($lastRecord->close - $yesterdayCloses[$product]) / $yesterdayCloses[$product]) * 100;
        // } elseif ($previousClose !== null && $previousClose > 0 && $lastRecord->close) {
        //     $percentageChange = (($lastRecord->close - $previousClose) / $previousClose) * 100;
        // }

        $percentageChange = null;
        if ($previousClose !== null && $previousClose > 0 && $lastRecord && $lastRecord->close) {
            $percentageChange = (($lastRecord->close - $previousClose) / $previousClose) * 100;
        }

        $marketCloseTime = Carbon::parse($today . ' 17:00:00');
        $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
            return $r->time->format('H:i') === '17:00';
        });

        $closeValue = $closeRecord ? floatval($closeRecord->close) : ($lastRecord->close ?? '');

        if (
            $lastRecord === null ||
            !is_numeric($lastOpen) || $lastOpen == 0 ||
            !is_numeric($closeValue) || $closeValue == 0 ||
            !is_numeric($maxHigh) || !is_numeric($minLow) ||
            empty($lastRecord->volume) ||
            empty($lastRecord->high) ||
            empty($lastRecord->low)
        ) {
            Log::info("Skipping $product due to invalid data: open=$lastOpen, close=$closeValue, high=$maxHigh, low=$minLow");
            continue;
        }

        $result[] = [
            'id' => $lastRecord->id ?? null,
            'dClose' => $dCloseOutput[$product] ?? null,
            'stock_id' => $lastRecord->stock_id ?? null,
            'app_name' => $lastRecord->Stock->app_name ?? '',
            'ticker' => $lastRecord->ticker ?? '',
            'name' => $lastRecord->name ?? '',
            'exchange' => $lastRecord->exchange ?? '',
            'interval' => $lastRecord->interval_at ?? '',
            'time' => $lastRecord->time ?? null,
            'date' => $lastRecord->time_2 ?? null,
            'open' => $lastOpen !== null ? number_format($lastOpen, 2, '.', '') : '',
            'day_open' => $firstEntryOnLastDate->open !== null ? number_format($firstEntryOnLastDate->open, 2, '.', '') : '',
            'close' => $closeValue !== '' ? number_format($closeValue, 2, '.', '') : '',
            'current_price' => $lastOpen !== null ? number_format(floatval($lastOpen), 2, '.', '') : '',
            'high' => $maxHigh ?? '',
            'low' => $minLow ?? '',
            'volume' => $lastRecord->volume ?? '',
            'quote' => $lastRecord->quote ?? '',
            'base' => $lastRecord->base ?? '',
            'previous_close' => $previousClose !== null ? number_format($previousClose, 2, '.', '') : '',
            'percentage_change_from_previous' => $percentageChange !== null
                ? number_format($percentageChange, 2, '.', '') : '',
            'd_pre' => $dPre ?? null,
            'SniPriceDiff' => $SniPriceDiff ?? '',
        ];
    }

    $result = collect($result)->unique('name')->values()->all();

    return response()->json([
        'status' => 200,
        'message' => 'Latest stock entries with calculations (fallback to latest available if no data for today)',
        'data' => $result,
        'date_used' => $today
    ]);
}






public function isMarketOpen()
{
    $now = Carbon::now();
    $today = $now->toDateString();
    $currentTime = $now->format('H:i');

    // Market time window
    $marketOpenTime = Carbon::parse($today . ' 09:30:00');
    $marketCloseTime = Carbon::parse($today . ' 17:00:00');

    $isWithinMarketTime = $now->between($marketOpenTime, $marketCloseTime);

    $marketActivity = StockCol::whereDate('time', $today)
        ->whereTime('time_2', '>=', '09:30:00')
        ->exists();

    $market = false;

    if ($isWithinMarketTime && $marketActivity) {
        $market = true;
    }

    return response()->json([
        'status' => 200,
        'market' => $market,
        'message' => $market
            ? 'Market is currently open.'
            : 'Market is currently closed.',
    ]);
}



    public function sniprice()
    {
        
        $category = SniPrice::orderBy('id','DESC')->get();
    

        if ($category->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'SNI Price Not found',
                'data' => []
            ], 201);
        }

        $formatted = $category->map(function ($category) {
            $diff =  $category->current_price - $category->price ?? 0;
            return [
                'id' => $category->id,
                'name' => $category->name,
                'price' => $category->price,
                'current_price' => $category->current_price,
                'change_type' => $category->change_type,
                'diff' => $diff,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'SNI Price fetched successfully',
            'data' => $formatted
        ]);
    }



    public function getCitiesByState(Request $request)
    {
        $request->validate([
            'state_id' => 'required'
        ]);

        $cities = City::where('state_id', $request->state_id)->get();

        if ($cities->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No cities found for this state',
                'data' => []
            ], 404);
        }

        $formatted = $cities->map(function ($city) {
            return [
                'id' => $city->id,
                'city_name' => $city->city_name,
                'state_id' => $city->state_id,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Cities fetched successfully',
            'data' => $formatted
        ]);
    }



public function loginRequestOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|string|regex:/^[0-9]{10}$/',
            'type' => 'required|in:1,2,3',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

         Log::info('Login OTP Request:', [
        'number' => $request->number,
        'type'   => $request->type,
    ]);

        $number = $request->number;
        $type = $request->type;

        $userExists = false;

        if ($type == 3) {
           $userExists = Vendor::where('phone_no', $number)->first();

            if ($userExists) {

              
            $status = (int) $userExists->status;  // convert to integer

            if ($status == 2) {
                    return response()->json([
                        'status'  => 201,
                        'message' => 'Your vendor account is deactivated. Please contact support.',
                    ], 201);
                }
            }
        } else {
            $userExists = User::where('phone', $number)
                            ->where('type', $type)
                            ->exists();
        }

        if (!$userExists) {
            return response()->json([
                'status' => 201,
                'message' => 'No account found for this number and type',
            ], 201);
        }

        $otpCode = rand(100000, 999999);
        // $otpCode = 123456; // Fixed for testing

        Otp::updateOrCreate(
            ['contact_no' => $number],
            [
                'name' => $userExists->name ?? null,
                'contact_no' => $number,
                'email' => $userExists->email ?? null,
                'otp' => $otpCode,
                'ip' => $request->ip(),
                'is_active' => 1,
                'date' => Carbon::now(),
            ]
        );

        $smsResponse = $this->sendOtpViaLegacyHttp($number, $otpCode);

        return response()->json([
            'status' => 200,
            'message' => 'OTP sent successfully',
            'sms_response' => $smsResponse['success'] ? [] : [$smsResponse['error']],
            // 'otp' => $otpCode, // Uncomment for debugging/testing only
        ], 200);
    }

 public function sendOtpViaLegacyHttp($phone, $otp)
{
    $authKey = env('MSG91_AUTH_KEY');
    $senderId = 'SNIGRP';
    $route = 4;
    $dltTemplateId = '1207175818457370480';

    if (empty($authKey)) {
        Log::error("MSG91 auth key is missing in .env");
        return [
            'success' => false,
            'error' => [
                'phone' => $phone,
                'message' => 'MSG91 auth key is not configured',
                'status' => 500,
            ]
        ];
    }

    $formattedPhone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($formattedPhone) === 10) {
        $formattedPhone = '91' . $formattedPhone;
    } elseif (strlen($formattedPhone) !== 12 || strpos($formattedPhone, '91') !== 0) {
        Log::warning("Invalid phone number format: {$formattedPhone}");
        return [
            'success' => false,
            'error' => [
                'phone' => $formattedPhone,
                'message' => 'Invalid phone number format',
                'status' => 400,
            ]
        ];
    }

    $otpFor = 'Login';
    $message = "Welcome To Shreenath Spice's, Your OTP for $otpFor is $otp . Valid For 10 Minutes Only. Keep It Confidential. Regards: Shreenath Industries";

    $queryParams = [
        'authkey'    => $authKey,
        'mobiles'    => $formattedPhone,
        'message'    => $message,
        'sender'     => $senderId,
        'route'      => $route,
        'DLT_TE_ID'  => $dltTemplateId,
    ];

    try {
        $response = Http::get('http://api.msg91.com/api/sendhttp.php', $queryParams);
        $responseStatus = $response->status();
        $responseBody = trim($response->body());

        Log::info('MSG91 raw response', [
            'to' => substr($formattedPhone, 0, 4) . 'XXXX' . substr($formattedPhone, -4),
            'otp' => $otp,
            'status' => $responseStatus,
            'raw_body' => $responseBody,
        ]);

        // ✅ If it's a 20-char hex string, it's a valid message ID
        if ($responseStatus == 200 && preg_match('/^[a-f0-9]{20}$/i', $responseBody)) {
            Log::info("OTP sent successfully to {$formattedPhone}, message ID: {$responseBody}");

            return [
                'success' => true,
                'message_id' => $responseBody,
            ];
        }

        $errorMessage = $responseBody;
        if (stripos($responseBody, 'authentication') !== false) {
            $errorMessage = 'Authentication failure';
        } elseif (stripos($responseBody, 'template') !== false) {
            $errorMessage = 'Invalid DLT template ID';
        }

        Log::warning("Failed to send OTP to {$formattedPhone}. Response: {$responseBody}");

        return [
            'success' => false,
            'error' => [
                'phone' => $formattedPhone,
                'message' => "Failed to send OTP: {$errorMessage}",
                'status' => $responseStatus ?: 400,
            ]
        ];
    } catch (\Exception $e) {
        Log::error("Error sending OTP to {$formattedPhone}: {$e->getMessage()}");
        return [
            'success' => false,
            'error' => [
                'phone' => $formattedPhone,
                'message' => "Error sending OTP: {$e->getMessage()}",
                'status' => 500,
            ]
        ];
    }
}



   public function loginVerifyOtp(Request $request)
    {
        $request->validate([
            'number' => 'required|string',
            'otp' => 'required|numeric',
            'type' => 'required|in:1,2,3',
        ]);

        $otp = Otp::where('contact_no', $request->number)
                ->where('otp', $request->otp)
                ->where('is_active', 1)
                ->first();

        if (!$otp) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired OTP',
            ], 400);
        }

        $otp->delete();

        if ($request->type == 3) {
            $user = Vendor::where('phone_no', $request->number)->first();
        } else {
            $user = User::where('phone', $request->number)
                        ->where('type', $request->type)
                        ->first();
        }

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        $tokenResult = $user->createToken('auth');  
        $token = $tokenResult->plainTextToken;     

        $user->auth = $token;
        $user->status = 5;
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'token' => $token,
            'data' => $user,
        ]);
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        if ($user instanceof \App\Models\User) {
            $type = $user->type; 
        } else {
            $type = 3; 
        }

        return response()->json([
            'status' => 200,
            'message' => 'Profile fetched successfully',
            'type' => $type,
            'data' => $user,
        ]);
    }


   public function logout(Request $request)
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        $user->status = 4;
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Logged out successfully',
        ]);
    }




   public function deviceIdUpdate(Request $request)
    {
        $request->validate([
            'device_id' => 'required|string|max:255',
            'fcm_token' => 'nullable|string',
        ]);

        $oldUser = User::where('device_id', $request->device_id)
            ->where('status', 4)
            ->where('entry_date', '<=', Carbon::now()->subDays(7)->toDateString())
            ->first();

        if ($oldUser) {
            return response()->json([
                'message' => 'Please login first',
                'status' => 208
            ], 200);
        }

        // If device_id already exists, return existing data
        $existingUser = User::where('device_id', $request->device_id)->first();
        // $existingUser->fcm_token = $request->fcm_token ?? null;
        // $existingUser->save();

        if ($existingUser) {
        //     $existingUser->fcm_token = $request->fcm_token ?? null;
        // $existingUser->save();
            return response()->json([
                'message' => 'Device ID already exists, not saved again.',
                'status' => 200,
                'data' => [
                    'device_id' => $existingUser->device_id,
                    'fcm_token' => $existingUser->fcm_token,
                    'status' => 4,
                    'entry_date' => $existingUser->entry_date,
                ]
            ], 200);
        }

        // Save new user
        $user = new User;
        $user->device_id = $request->device_id;
        $user->fcm_token = $request->fcm_token ?? null;
        $user->entry_date = Carbon::now();
        $user->status = 4;
        $user->save();

        return response()->json([
            'message' => 'Device info saved successfully.',
            'status' => 200,
            'data' => [
                'device_id' => $user->device_id,
                'fcm_token' => $user->fcm_token,
                'entry_date' => $user->entry_date,
            ]
        ], 200);
    }



    public function getRecentNotifications()
        {

            $twentyFourHoursAgo = Carbon::now()->subHours(24);

           $notifications = Notifications::where('time', '>=', $twentyFourHoursAgo)
                                  ->orderBy('time', 'desc')
                                  ->get()
                                  ->map(function ($notification) {
                                      return [
                                          'id' => $notification->id,
                                          'title' => $notification->title,
                                          'body' => $notification->body,
                                          'image' => asset($notification->image),
                                          'product_id' => (string) $notification->product_id,
                                          'category_id' => (string) $notification->category_id,
                                          'screen' => $notification->screen,
                                          'name' => $notification->name,
                                          'time' => Carbon::parse($notification->time)->format('Y-m-d H:i:s'),
                                      ];
                                  });


            return response()->json([
                'status' => 200,
                'data' => $notifications,
            ]);
        }

    
}
