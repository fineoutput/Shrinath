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

class AuthController extends Controller
{
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
                'status' => 0,  
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
                'status' => 0, 
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

            return response()->json([
                'status' => 200,
                'message' => 'User registered successfully. OTP sent.',
                'data' => $user,
            ]);
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

    $existingUser = User::where('device_id', $request->device_id)->first();

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
            'status'        => 1, 
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

    $existingUser = User::where('device_id', $request->device_id)->first();


    $unverifiedUser = UnverifyUser::where('phone', $request->number)->first();

    if (!$unverifiedUser) {
        return response()->json([
            'status' => 404,
            'message' => 'User not found',
        ], 404);
    }

     $existingUser->phone = $unverifiedUser->phone;
     $existingUser->email = $unverifiedUser->email;
     $existingUser->name = $unverifiedUser->name;
     $existingUser->type = $unverifiedUser->type;
     $existingUser->business_name = $unverifiedUser->business_name;
     $existingUser->city = $unverifiedUser->city;
     $existingUser->address = $unverifiedUser->address;
     $existingUser->gst_no = $unverifiedUser->gst_no;
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


//     public function stockCol()
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

//     $todayRecords = $categories->filter(function ($r) use ($today) {
//         return $r->time->toDateString() === $today;
//     });

//     if ($todayRecords->isEmpty()) {
//         return response()->json([
//             'status' => 200,
//             'message' => 'No records found for today',
//             'data' => [],
//         ]);
//     }

//     // Get JEERAA2_1D previous day's close
//     $jeeraa2_1d_yesterday_close = null;
//     $jeeraa2All = $categories->where('name', 'JEERAA2_1D')->sortBy('time')->values();

//     $jeeraa2_1d_yesterday_record = $jeeraa2All->filter(function ($r) use ($today) {
//         return $r->time->toDateString() < $today;
//     })->last();

//     if ($jeeraa2_1d_yesterday_record) {
//         $jeeraa2_1d_yesterday_close = floatval($jeeraa2_1d_yesterday_record->close);
//     }

//     $groupedByName = $todayRecords->groupBy('name');

//     foreach ($groupedByName as $name => $records) {
//         $records = $records->sortBy('time')->values(); 
//         $firstOpen = floatval($records->first()->open);
//         $maxHigh = $records->max('high');
//         $minLow = $records->min('low');
//         $lastRecord = $records->last(); 

//         $allRecordsForName = $categories->where('name', $name)->sortBy('time')->values();
//         $previousCloseRecord = $allRecordsForName->filter(function ($r) use ($today) {
//             return $r->time->toDateString() < $today;
//         })->last();
//         $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

//         $sniPrice = $sniPrices[$name]->price ?? null;
//         $sniCurrentPrice = $sniPrices[$name]->current_price ?? null;

//         $percentageChange = null;
//         if ($name === 'JEERA2' && $jeeraa2_1d_yesterday_close !== null && $jeeraa2_1d_yesterday_close > 0) {
//             $percentageChange = (($lastRecord->open - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100;
//         } elseif ($previousClose !== null && $previousClose > 0) {
//             $percentageChange = (($lastRecord->open - $previousClose) / $previousClose) * 100;
//         }

//         $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

//         $dPre = null;
//         if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
//             $dPre = $sniCurrentPrice - $firstOpen;  
//         }

//         $marketCloseTime = Carbon::parse($today . ' 17:00:00');
//         $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
//             return $r->time->format('H:i') === '17:00';
//         });

//         $closeValue = $closeRecord ? floatval($closeRecord->close) : 'N/A';

//         $result[] = [
//             'id' => $lastRecord->id,
//             'stock_id' => $lastRecord->stock_id,
//             'app_name' => $lastRecord->Stock->app_name ?? '',
//             'ticker' => $lastRecord->ticker,
//             'name' => $lastRecord->name,
//             'exchange' => $lastRecord->exchange,
//             'interval' => $lastRecord->interval_at,
//             'time' => $lastRecord->time,
//             'date' => $lastRecord->time_2,
//             'open' => number_format($firstOpen, 2, '.', ''),
//             'close' => $lastRecord->close,
//             'current_price' => number_format(floatval($lastRecord->open), 2, '.', ''),
//             'high' => $maxHigh,
//             'low' => $minLow,
//             'volume' => $lastRecord->volume,
//             'quote' => $lastRecord->quote,
//             'base' => $lastRecord->base,
//             'previous_close' => $name === 'JEERA2' ? $jeeraa2_1d_yesterday_close : $previousClose,
//             'percentage_change_from_previous' => $percentageChange !== null
//                 ? number_format($percentageChange, 2, '.', '')
//                 : null,
//             'd_pre' => $dPre,
//             'SniPriceDiff' => $SniPriceDiff,
//         ];
//     }

//     // Special case override for JEERA2's close from JEERAA2_1D
//     $jeeraa2_1d_close = null;
//     foreach ($result as $item) {
//         if ($item['name'] === 'JEERAA2_1D') {
//             $jeeraa2_1d_close = $item['close'];
//             break;
//         }
//     }

//     $jeeraIndex = null;
//     foreach ($result as $index => $item) {
//         if ($item['name'] === 'JEERA2') {
//             $jeeraIndex = $index;
//             break;
//         }
//     }

//     if ($jeeraIndex === null && $jeeraa2_1d_close !== null) {
//         $latestJeeraRecord = $categories->where('name', 'JEERA2')->sortByDesc('time')->first();

//         if ($latestJeeraRecord) {
//             $result[] = [
//                 'id' => $latestJeeraRecord->id,
//                 'stock_id' => $latestJeeraRecord->stock_id,
//                 'app_name' => $latestJeeraRecord->Stock->app_name ?? '',
//                 'ticker' => $latestJeeraRecord->ticker,
//                 'name' => 'JEERA2',
//                 'exchange' => $latestJeeraRecord->exchange,
//                 'interval' => $latestJeeraRecord->interval_at,
//                 'time' => $latestJeeraRecord->time,
//                 'date' => $latestJeeraRecord->time_2,
//                 'open' => number_format(floatval($latestJeeraRecord->open), 2, '.', ''),
//                 'close' => $jeeraa2_1d_close,
//                 'current_price' => number_format(floatval($latestJeeraRecord->open), 2, '.', ''),
//                 'high' => $latestJeeraRecord->high,
//                 'low' => $latestJeeraRecord->low,
//                 'volume' => $latestJeeraRecord->volume,
//                 'quote' => $latestJeeraRecord->quote,
//                 'base' => $latestJeeraRecord->base,
//                 'previous_close' => $jeeraa2_1d_yesterday_close,
//                 'percentage_change_from_previous' => ($jeeraa2_1d_yesterday_close > 0)
//                     ? number_format((($latestJeeraRecord->open - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100, 2, '.', '')
//                     : null,
//                 'd_pre' => null,
//                 'SniPriceDiff' => null,
//             ];
//         }
//     } elseif ($jeeraIndex !== null && $jeeraa2_1d_close !== null) {
//         $result[$jeeraIndex]['close'] = $jeeraa2_1d_close;
//     }

//     $specialOrder = [
//         'JEERA', 'JEERA2',
//         'DHANIYA', 'DHANIYA2',
//         'TMC', 'TMC2',
//         'GUARSEED', 'GUARSEED2',
//         'GUARGUM', 'GUARGUM2',
//         'CASTOR', 'CASTOR2',
//         'GOLD', 'GOLD2',
//         'SILVER', 'SILVER2',
//         'NATURALGAS',
//         'CRUDEOIL',
//         'USDINR',
//         'NIFTY',
//         'SENSEX',
//     ];

//     $collection = collect($result);

//     $normalItems = $collection->filter(function ($item) use ($specialOrder) {
//         return !in_array($item['name'], $specialOrder);
//     });

//     $specialItems = $collection->filter(function ($item) use ($specialOrder) {
//         return in_array($item['name'], $specialOrder);
//     })->sortBy(function ($item) use ($specialOrder) {
//         return array_search($item['name'], $specialOrder);
//     });

//     $final = $normalItems->merge($specialItems)->values();

//     return response()->json([
//         'status' => 200,
//         'message' => 'Top 2 latest stock entries for today',
//         'data' => $final,
//     ]);
// }


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

//     // Filter today's records
//     $todayRecords = $categories->filter(function ($r) use ($today) {
//         return $r->time->toDateString() === $today;
//     });

//     // 🛠️ If no records today, fallback to most recent past date
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

//         // Use this date as the new reference point
//         $today = $latestAvailableDate;
//     }

//     // Get JEERAA2_1D previous day's close
//     $jeeraa2_1d_yesterday_close = null;
//     $jeeraa2All = $categories->where('name', 'JEERAA2_1D')->sortBy('time')->values();

//     $jeeraa2_1d_yesterday_record = $jeeraa2All->filter(function ($r) use ($today) {
//         return $r->time->toDateString() < $today;
//     })->last();

//     if ($jeeraa2_1d_yesterday_record) {
//         $jeeraa2_1d_yesterday_close = floatval($jeeraa2_1d_yesterday_record->close);
//     } else {
//         // 🛠️ Fallback: Use latest available JEERAA2_1D record
//         $latestJeeraa2Record = $jeeraa2All->sortByDesc('time')->first();
//         if ($latestJeeraa2Record) {
//             $jeeraa2_1d_yesterday_close = floatval($latestJeeraa2Record->close);
//         }
//     }

//     $groupedByName = $todayRecords->groupBy('name');

//     foreach ($groupedByName as $name => $records) {
//         $records = $records->sortBy('time')->values(); 
//         $firstOpen = floatval($records->first()->open);
//         $maxHigh = $records->max('high');
//         $minLow = $records->min('low');
//         $lastRecord = $records->last(); 

//         $allRecordsForName = $categories->where('name', $name)->sortBy('time')->values();
//         $previousCloseRecord = $allRecordsForName->filter(function ($r) use ($today) {
//             return $r->time->toDateString() < $today;
//         })->last();
//         $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

//         $sniPrice = $sniPrices[$name]->price ?? null;
//         $sniCurrentPrice = $sniPrices[$name]->current_price ?? null;

//         $percentageChange = null;
//         if ($name === 'JEERA2' && $jeeraa2_1d_yesterday_close !== null && $jeeraa2_1d_yesterday_close > 0) {
//             $percentageChange = (($lastRecord->open - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100;
//         } elseif ($previousClose !== null && $previousClose > 0) {
//             $percentageChange = (($lastRecord->open - $previousClose) / $previousClose) * 100;
//         }

//         $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

//         $dPre = null;
//         if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
//             $dPre = $sniCurrentPrice - $firstOpen;  
//         }

//         $marketCloseTime = Carbon::parse($today . ' 17:00:00');
//         $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
//             return $r->time->format('H:i') === '17:00';
//         });

//         $closeValue = $closeRecord ? floatval($closeRecord->close) : 'N/A';

//         $result[] = [
//             'id' => $lastRecord->id,
//             'stock_id' => $lastRecord->stock_id,
//             'app_name' => $lastRecord->Stock->app_name ?? '',
//             'ticker' => $lastRecord->ticker,
//             'name' => $lastRecord->name,
//             'exchange' => $lastRecord->exchange,
//             'interval' => $lastRecord->interval_at,
//             'time' => $lastRecord->time,
//             'date' => $lastRecord->time_2,
//             'open' => number_format($firstOpen, 2, '.', ''),
//             'close' => $lastRecord->close,
//             'current_price' => number_format(floatval($lastRecord->open), 2, '.', ''),
//             'high' => $maxHigh,
//             'low' => $minLow,
//             'volume' => $lastRecord->volume,
//             'quote' => $lastRecord->quote,
//             'base' => $lastRecord->base,
//             'previous_close' => $name === 'JEERA2' ? $jeeraa2_1d_yesterday_close : $previousClose,
//             'percentage_change_from_previous' => $percentageChange !== null
//                 ? number_format($percentageChange, 2, '.', '')
//                 : null,
//             'd_pre' => $dPre,
//             'SniPriceDiff' => $SniPriceDiff,
//         ];
//     }

//     $jeeraa2_1d_close = null;
//     foreach ($result as $item) {
//         if ($item['name'] === 'JEERAA2_1D') {
//             $jeeraa2_1d_close = $item['close'];
//             break;
//         }
//     }

//     $jeeraIndex = null;
//     foreach ($result as $index => $item) {
//         if ($item['name'] === 'JEERA2') {
//             $jeeraIndex = $index;
//             break;
//         }
//     }

//     if ($jeeraIndex === null && $jeeraa2_1d_close !== null) {
//         $latestJeeraRecord = $categories->where('name', 'JEERA2')->sortByDesc('time')->first();

//         if ($latestJeeraRecord) {
//             $result[] = [
//                 'id' => $latestJeeraRecord->id,
//                 'stock_id' => $latestJeeraRecord->stock_id,
//                 'app_name' => $latestJeeraRecord->Stock->app_name ?? '',
//                 'ticker' => $latestJeeraRecord->ticker,
//                 'name' => 'JEERA2',
//                 'exchange' => $latestJeeraRecord->exchange,
//                 'interval' => $latestJeeraRecord->interval_at,
//                 'time' => $latestJeeraRecord->time,
//                 'date' => $latestJeeraRecord->time_2,
//                 'open' => number_format(floatval($latestJeeraRecord->open), 2, '.', ''),
//                 'close' => $jeeraa2_1d_close,
//                 'current_price' => number_format(floatval($latestJeeraRecord->open), 2, '.', ''),
//                 'high' => $latestJeeraRecord->high,
//                 'low' => $latestJeeraRecord->low,
//                 'volume' => $latestJeeraRecord->volume,
//                 'quote' => $latestJeeraRecord->quote,
//                 'base' => $latestJeeraRecord->base,
//                 'previous_close' => $jeeraa2_1d_yesterday_close,
//                 'percentage_change_from_previous' => ($jeeraa2_1d_yesterday_close > 0)
//                     ? number_format((($latestJeeraRecord->open - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100, 2, '.', '')
//                     : null,
//                 'd_pre' => null,
//                 'SniPriceDiff' => null,
//             ];
//         }
//     } elseif ($jeeraIndex !== null && $jeeraa2_1d_close !== null) {
//         $result[$jeeraIndex]['close'] = $jeeraa2_1d_close;
//     }

//     $specialOrder = [
//         'JEERA', 'JEERA2',
//         'DHANIYA', 'DHANIYA2',
//         'TMC', 'TMC2',
//         'GUARSEED', 'GUARSEED2',
//         'GUARGUM', 'GUARGUM2',
//         'CASTOR', 'CASTOR2',
//         'GOLD', 'GOLD2',
//         'SILVER', 'SILVER2',
//         'NATURALGAS',
//         'CRUDEOIL',
//         'USDINR',
//         'NIFTY',
//         'SENSEX',
//     ];

//     $collection = collect($result)->reject(function ($item) {
//         return $item['name'] === 'JEERAA2_1D';
//     });

//     $normalItems = $collection->filter(function ($item) use ($specialOrder) {
//         return !in_array($item['name'], $specialOrder);
//     });

//     $specialItems = $collection->filter(function ($item) use ($specialOrder) {
//         return in_array($item['name'], $specialOrder);
//     })->sortBy(function ($item) use ($specialOrder) {
//         return array_search($item['name'], $specialOrder);
//     });

//     $final = $normalItems->merge($specialItems)->values();

//     return response()->json([
//         'status' => 200,
//         'message' => 'Top 2 latest stock entries (fallback to latest available if today is off)',
//         'data' => $final,
//         'date_used' => $today
//     ]);
// }



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

//     // Filter today's records
//     $todayRecords = $categories->filter(function ($r) use ($today) {
//         return $r->time->toDateString() === $today;
//     });

//     // 🛠️ If no records today, fallback to most recent past date
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

//         // Use this date as the new reference point
//         $today = $latestAvailableDate;
//     }

//     // Get JEERAA2_1D previous day's close
//     $jeeraa2_1d_yesterday_close = null;
//     $jeeraa2All = $categories->where('name', 'JEERAA2_1D')->sortBy('time')->values();

//     $jeeraa2_1d_yesterday_record = $jeeraa2All->filter(function ($r) use ($today) {
//         return $r->time->toDateString() < $today;
//     })->last();

//     if ($jeeraa2_1d_yesterday_record) {
//         $jeeraa2_1d_yesterday_close = floatval($jeeraa2_1d_yesterday_record->close);
//     } else {
//         // 🛠️ Fallback: Use latest available JEERAA2_1D record
//         $latestJeeraa2Record = $jeeraa2All->sortByDesc('time')->first();
//         if ($latestJeeraa2Record) {
//             $jeeraa2_1d_yesterday_close = floatval($latestJeeraa2Record->close);
//         }
//     }

//     $groupedByName = $todayRecords->groupBy('name');

//     foreach ($groupedByName as $name => $records) {
//         $records = $records->sortBy('time')->values();
//         $firstOpen = floatval($records->first()->open);
//         $maxHigh = $records->max('high');
//         $minLow = $records->min('low');
//         $lastRecord = $records->last();

//         $allRecordsForName = $categories->where('name', $name)->sortBy('time')->values();
//         $previousCloseRecord = $allRecordsForName->filter(function ($r) use ($today) {
//             return $r->time->toDateString() < $today;
//         })->last();
//         $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

//         $sniPrice = $sniPrices[$name]->price ?? null;
//         $sniCurrentPrice = $sniPrices[$name]->current_price ?? null;

//         $percentageChange = null;
//         if ($name === 'JEERA2' && $jeeraa2_1d_yesterday_close !== null && $jeeraa2_1d_yesterday_close > 0) {
//             $percentageChange = (($lastRecord->open - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100;
//         } elseif ($previousClose !== null && $previousClose > 0) {
//             $percentageChange = (($lastRecord->open - $previousClose) / $previousClose) * 100;
//         }

//         $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

//         $dPre = null;
//         if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
//             $dPre = $sniCurrentPrice - $firstOpen;
//         }

//         $marketCloseTime = Carbon::parse($today . ' 17:00:00');
//         $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
//             return $r->time->format('H:i') === '17:00';
//         });

//         $closeValue = $closeRecord ? floatval($closeRecord->close) : 'N/A';

//         $result[] = [
//             'id' => $lastRecord->id,
//             'stock_id' => $lastRecord->stock_id,
//             'app_name' => $lastRecord->Stock->app_name ?? '',
//             'ticker' => $lastRecord->ticker,
//             'name' => $lastRecord->name,
//             'exchange' => $lastRecord->exchange,
//             'interval' => $lastRecord->interval_at,
//             'time' => $lastRecord->time,
//             'date' => $lastRecord->time_2,
//             'open' => number_format($firstOpen, 2, '.', ''),
//             'close' => $lastRecord->close,
//             'current_price' => number_format(floatval($lastRecord->open), 2, '.', ''),
//             'high' => $maxHigh,
//             'low' => $minLow,
//             'volume' => $lastRecord->volume,
//             'quote' => $lastRecord->quote,
//             'base' => $lastRecord->base,
//             'previous_close' => $name === 'JEERA2' ? $jeeraa2_1d_yesterday_close : $previousClose,
//             'percentage_change_from_previous' => $percentageChange !== null
//                 ? number_format($percentageChange, 2, '.', '')
//                 : null,
//             'd_pre' => $dPre,
//             'SniPriceDiff' => $SniPriceDiff,
//         ];
//     }

//     // ✅ Add JEERA2 manually if it's not in today's records
//     if (!$groupedByName->has('JEERA2')) {
//         $latestJeeraRecord = $categories->where('name', 'JEERA2')->sortByDesc('time')->first();

//         if ($latestJeeraRecord) {
//             $firstOpen = floatval($latestJeeraRecord->open);
//             $sniPrice = $sniPrices['JEERA2']->price ?? null;
//             $sniCurrentPrice = $sniPrices['JEERA2']->current_price ?? null;
//             $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

//             $dPre = null;
//             if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
//                 $dPre = $sniCurrentPrice - $firstOpen;
//             }

//             $percentageChange = null;
//             if ($jeeraa2_1d_yesterday_close !== null && $jeeraa2_1d_yesterday_close > 0) {
//                 $percentageChange = (($firstOpen - $jeeraa2_1d_yesterday_close) / $jeeraa2_1d_yesterday_close) * 100;
//             }

//             $result[] = [
//                 'id' => $latestJeeraRecord->id,
//                 'stock_id' => $latestJeeraRecord->stock_id,
//                 'app_name' => $latestJeeraRecord->Stock->app_name ?? '',
//                 'ticker' => $latestJeeraRecord->ticker,
//                 'name' => 'JEERA2',
//                 'exchange' => $latestJeeraRecord->exchange,
//                 'interval' => $latestJeeraRecord->interval_at,
//                 'time' => $latestJeeraRecord->time,
//                 'date' => $latestJeeraRecord->time_2,
//                 'open' => number_format($firstOpen, 2, '.', ''),
//                 'close' => $jeeraa2_1d_yesterday_close ?? $latestJeeraRecord->close,
//                 'current_price' => number_format($firstOpen, 2, '.', ''),
//                 'high' => $latestJeeraRecord->high,
//                 'low' => $latestJeeraRecord->low,
//                 'volume' => $latestJeeraRecord->volume,
//                 'quote' => $latestJeeraRecord->quote,
//                 'base' => $latestJeeraRecord->base,
//                 'previous_close' => $jeeraa2_1d_yesterday_close,
//                 'percentage_change_from_previous' => $percentageChange !== null
//                     ? number_format($percentageChange, 2, '.', '')
//                     : null,
//                 'd_pre' => $dPre,
//                 'SniPriceDiff' => $SniPriceDiff,
//             ];
//         }
//     }

//     $specialOrder = [
//         'JEERA', 'JEERA2',
//         'DHANIYA', 'DHANIYA2',
//         'TMC', 'TMC2',
//         'GUARSEED', 'GUARSEED2',
//         'GUARGUM', 'GUARGUM2',
//         'CASTOR', 'CASTOR2',
//         'GOLD', 'GOLD2',
//         'SILVER', 'SILVER2',
//         'NATURALGAS',
//         'CRUDEOIL',
//         'USDINR',
//         'NIFTY',
//         'SENSEX',
//     ];

//     $collection = collect($result)->reject(function ($item) {
//         return $item['name'] === 'JEERAA2_1D';
//     });

//     $normalItems = $collection->filter(function ($item) use ($specialOrder) {
//         return !in_array($item['name'], $specialOrder);
//     });

//     $specialItems = $collection->filter(function ($item) use ($specialOrder) {
//         return in_array($item['name'], $specialOrder);
//     })->sortBy(function ($item) use ($specialOrder) {
//         return array_search($item['name'], $specialOrder);
//     });

//     $final = $normalItems->merge($specialItems)->values();

//     return response()->json([
//         'status' => 200,
//         'message' => 'Top 2 latest stock entries (fallback to latest available if today is off)',
//         'data' => $final,
//         'date_used' => $today
//     ]);
// }


public function stockCol()
{
    $categories = StockCol::orderBy('name')
        ->orderBy('time', 'ASC')
        ->orderBy('id', 'ASC')
        ->get();

    $sniPrices = SniPrice::all()->keyBy('name');
    $result = [];

    foreach ($categories as $r) {
        $r->time = Carbon::parse($r->time);
    }

    $today = Carbon::now()->toDateString();

    // Filter today's records
    $todayRecords = $categories->filter(function ($r) use ($today) {
        return $r->time->toDateString() === $today;
    });

    // 🛠️ If no records today, fallback to most recent past date
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

    $oneDayCloseMapping = [
        'JEERA2' => 'JEERAA2_1D',
        'JEERA3' => 'JEERAA3_1D',
        'DHANIYA2' => 'DHANIYA2_1D',
        'DHANIYA' => 'DHANIYA_1D',
        'TURMERIC' => 'TURMERIC_1D',
        'TURMERIC2' => 'TURMERIC2_1D',
        'GUARGUM2' => 'GUARGUM2_1D',
        'GUARGUM' => 'GUARGUM_1D',
        'GUARSEED' => 'GUARSEED_1D',
        'GUARSEED2' => 'GUARSEED2_1D',
    ];

    $yesterdayCloses = [];

    foreach ($oneDayCloseMapping as $mainName => $refName) {
        $records = $categories->where('name', $refName)->sortBy('time')->values();

        $yesterdayRecord = $records->filter(function ($r) use ($today) {
            return $r->time->toDateString() < $today;
        })->last();

        if ($yesterdayRecord) {
            $yesterdayCloses[$mainName] = floatval($yesterdayRecord->close);
        } else {
            $latestRecord = $records->sortByDesc('time')->first();
            if ($latestRecord) {
                $yesterdayCloses[$mainName] = floatval($latestRecord->close);
            }
        }
    }

    $groupedByName = $todayRecords->groupBy('name');

    foreach ($groupedByName as $name => $records) {
        $records = $records->sortBy('time')->values();
        $firstOpen = floatval($records->first()->open);
        $maxHigh = $records->max('high');
        $minLow = $records->min('low');
        $lastRecord = $records->last();

        $allRecordsForName = $categories->where('name', $name)->sortBy('time')->values();
        $previousCloseRecord = $allRecordsForName->filter(function ($r) use ($today) {
            return $r->time->toDateString() < $today;
        })->last();
        $previousClose = $previousCloseRecord ? floatval($previousCloseRecord->close) : null;

        $sniPrice = $sniPrices[$name]->price ?? null;
        $sniCurrentPrice = $sniPrices[$name]->current_price ?? null;

        $percentageChange = null;
        if (isset($yesterdayCloses[$name]) && $yesterdayCloses[$name] > 0) {
            $percentageChange = (($lastRecord->open - $yesterdayCloses[$name]) / $yesterdayCloses[$name]) * 100;
        } elseif ($previousClose !== null && $previousClose > 0) {
            $percentageChange = (($lastRecord->open - $previousClose) / $previousClose) * 100;
        }

        $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

        $dPre = null;
        if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
            $dPre = $sniCurrentPrice - $firstOpen;
        }

        $marketCloseTime = Carbon::parse($today . ' 17:00:00');
        $closeRecord = $records->first(function ($r) use ($marketCloseTime) {
            return $r->time->format('H:i') === '17:00';
        });

        $closeValue = $closeRecord ? floatval($closeRecord->close) : 'N/A';

        $result[] = [
            'id' => $lastRecord->id,
            'stock_id' => $lastRecord->stock_id,
            'app_name' => $lastRecord->Stock->app_name ?? '',
            'ticker' => $lastRecord->ticker,
            'name' => $lastRecord->name,
            'exchange' => $lastRecord->exchange,
            'interval' => $lastRecord->interval_at,
            'time' => $lastRecord->time,
            'date' => $lastRecord->time_2,
            'open' => number_format($firstOpen, 2, '.', ''),
            'close' => $lastRecord->close,
            'current_price' => number_format(floatval($lastRecord->open), 2, '.', ''),
            'high' => $maxHigh,
            'low' => $minLow,
            'volume' => $lastRecord->volume,
            'quote' => $lastRecord->quote,
            'base' => $lastRecord->base,
            'previous_close' => $yesterdayCloses[$name] ?? $previousClose,
            'percentage_change_from_previous' => $percentageChange !== null
                ? number_format($percentageChange, 2, '.', '')
                : null,
            'd_pre' => $dPre,
            'SniPriceDiff' => $SniPriceDiff,
        ];
    }

    // ✅ Add JEERA2 manually if it's not in today's records
    if (!$groupedByName->has('JEERA2')) {
        $latestJeeraRecord = $categories->where('name', 'JEERA2')->sortByDesc('time')->first();

        if ($latestJeeraRecord) {
            $firstOpen = floatval($latestJeeraRecord->open);
            $sniPrice = $sniPrices['JEERA2']->price ?? null;
            $sniCurrentPrice = $sniPrices['JEERA2']->current_price ?? null;
            $SniPriceDiff = $sniPrice - $sniCurrentPrice ?? null;

            $dPre = null;
            if ($sniCurrentPrice !== null && $sniCurrentPrice > 0) {
                $dPre = $sniCurrentPrice - $firstOpen;
            }

            $prevClose = $yesterdayCloses['JEERA2'] ?? null;
            $percentageChange = null;
            if ($prevClose !== null && $prevClose > 0) {
                $percentageChange = (($firstOpen - $prevClose) / $prevClose) * 100;
            }

            $result[] = [
                'id' => $latestJeeraRecord->id,
                'stock_id' => $latestJeeraRecord->stock_id,
                'app_name' => $latestJeeraRecord->Stock->app_name ?? '',
                'ticker' => $latestJeeraRecord->ticker,
                'name' => 'JEERA2',
                'exchange' => $latestJeeraRecord->exchange,
                'interval' => $latestJeeraRecord->interval_at,
                'time' => $latestJeeraRecord->time,
                'date' => $latestJeeraRecord->time_2,
                'open' => number_format($firstOpen, 2, '.', ''),
                'close' => $prevClose ?? $latestJeeraRecord->close,
                'current_price' => number_format($firstOpen, 2, '.', ''),
                'high' => $latestJeeraRecord->high,
                'low' => $latestJeeraRecord->low,
                'volume' => $latestJeeraRecord->volume,
                'quote' => $latestJeeraRecord->quote,
                'base' => $latestJeeraRecord->base,
                'previous_close' => $prevClose,
                'percentage_change_from_previous' => $percentageChange !== null
                    ? number_format($percentageChange, 2, '.', '')
                    : null,
                'd_pre' => $dPre,
                'SniPriceDiff' => $SniPriceDiff,
            ];
        }
    }

    $specialOrder = [
        'JEERA2', 'JEERA3',
        'DHANIYA', 'DHANIYA2',
        'TURMERIC', 'TURMERIC2',
        'GUARSEED', 'GUARSEED2',
        'GUARGUM', 'GUARGUM2',
        // 'CASTOR', 'CASTOR2',
        // 'TMC', 'TMC2',
        // 'GOLD', 'GOLD2',
        // 'SILVER', 'SILVER2',
        // 'NATURALGAS',
        // 'CRUDEOIL',
        // 'USDINR',
        // 'NIFTY',
        // 'SENSEX',
    ];

    $collection = collect($result)->reject(function ($item) {
        return $item['name'] === 'JEERAA2_1D';
    });

    // $normalItems = $collection->filter(function ($item) use ($specialOrder) {
    //     return !in_array($item['name'], $specialOrder);
    // });

    // $specialItems = $collection->filter(function ($item) use ($specialOrder) {
    //     return in_array($item['name'], $specialOrder);
    // })->sortBy(function ($item) use ($specialOrder) {
    //     return array_search($item['name'], $specialOrder);
    // });

    // $final = $normalItems->merge($specialItems)->values();
    
    $final = collect($result)
    ->filter(function ($item) use ($specialOrder) {
        return in_array($item['name'], $specialOrder);
    })
    ->sortBy(function ($item) use ($specialOrder) {
        return array_search($item['name'], $specialOrder);
    })
    ->values();

    return response()->json([
        'status' => 200,
        'message' => 'Top 2 latest stock entries (fallback to latest available if today is off)',
        'data' => $final,
        'date_used' => $today
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
            $diff = $category->price - $category->current_price ?? 0;
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
        $request->validate([
            'number' => 'required|string',
            'type' => 'required|in:1,2,3',
        ]);

        $number = $request->number;
        $type = $request->type;

        $userExists = false;

        if ($type == 3) {
            $userExists = Vendor::where('phone_no', $number)->exists();
        } else {
            $userExists = User::where('phone', $number)
                            ->where('type', $type)
                            ->exists();
        }

        if (!$userExists) {
            return response()->json([
                'status' => 404,
                'message' => 'No account found for this number and type',
            ], 404);
        }

        // $otpCode = rand(100000, 999999);
        $otpCode = 123456;

        Otp::updateOrCreate(
            ['contact_no' => $number],
            [
                'name' => 'Login',
                'contact_no' => $number,
                'email' => null,
                'otp' => $otpCode,
                'ip' => $request->ip(),
                'is_active' => 1,
                'date' => \Carbon\Carbon::now(),
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'OTP sent successfully',
            // 'otp' => $otpCode, // for testing
        ]);
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
        $user->status = Carbon::now();
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
