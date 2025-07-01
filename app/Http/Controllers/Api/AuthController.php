<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\UnverifyUser;
use App\Models\User;
use App\Models\UnverifyVendor;
use App\Models\Vendor;
use App\Models\Otp;
use App\Models\State;
use Carbon\Carbon;

class AuthController extends Controller
{
    


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



//   public function verifyOtp(Request $request)
//     {
//         $request->validate([
//             'number' => 'required|string',
//             'otp' => 'required|numeric',
//             'type' => 'required|in:1,2,3',
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

//         // Delete OTP after verification
//         $otpRecord->delete();

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
//                 'name' => $unverified->name,
//                 'business_name' => $unverified->business_name,
//                 'phone_no' => $unverified->phone_no,
//                 'email' => $unverified->email,
//                 'depot_id' => $unverified->depot_id,
//                 'state_id' => $unverified->state_id,
//                 'city_id' => $unverified->city_id,
//                 'gst_no' => $unverified->gst_no ?? '',
//                 'status' => 1,
//             ]);

//             // Delete the unverified record
//             $unverified->delete();

//             $token = $vendor->createToken('auth')->plainTextToken;

//             return response()->json([
//                 'status' => 200,
//                 'message' => 'Vendor verified and registered successfully',
//                 'token' => $token,
//                 'user' => $vendor,
//             ]);

//         } else {
//             if (User::where('phone', $request->number)->exists()) {
//                 return response()->json([
//                     'status' => 201,
//                     'message' => 'User with this number already exists.',
//                 ], 409);
//             }

//             $unverified = UnverifyUser::where('phone', $request->number)->first();

//             if (!$unverified) {
//                 return response()->json([
//                     'status' => 201,
//                     'message' => 'User not found',
//                 ], 404);
//             }

//             $user = User::create([
//                 'name' => $unverified->name,
//                 'email' => $unverified->email,
//                 'phone' => $unverified->phone,
//                 'type' => $unverified->type,
//                 'business_name' => $unverified->business_name,
//                 'city' => $unverified->city,
//                 'address' => $unverified->address,
//                 'gst_no' => $unverified->gst_no,
//                 'status' => 1,
//             ]);

//             // Delete the unverified record
//             $unverified->delete();

//             $token = $user->createToken('auth')->plainTextToken;

//             return response()->json([
//                 'status' => 200,
//                 'message' => 'User verified and registered successfully',
//                 'token' => $token,
//                 'data' => $user,
//             ]);
//         }
//     }


 public function verifyOtp(Request $request)
    {
        $request->validate([
            'number'     => 'required|string',
            'otp'        => 'required|numeric',
            'type'       => 'required|in:1,2,3',
            'device_id'  => 'required|string'
        ]);

        // 🔍 Check OTP
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

        // ❌ Delete OTP after verification
        $otpRecord->delete();

        // 🔁 Handle existing User by device_id
        $existingUser = User::where('device_id', $request->device_id)->first();

        if ($existingUser) {
            if ($request->type == 3) {
                // ✅ Move user to Vendor if type is 3
                $vendor = Vendor::create([
                    'name'          => $existingUser->name,
                    'business_name' => $existingUser->business_name,
                    'phone_no'      => $request->number,
                    'email'         => $existingUser->email,
                    'gst_no'        => $existingUser->gst_no ?? '',
                    'status'        => 1,
                ]);

                $existingUser->delete(); // delete user after migration
            } else {
                // 🔄 Just update the phone if type is not 3
                $existingUser->phone = $request->number;
                $existingUser->save();
            }
        }

        // ✅ Type 3: Vendor registration
        if ($request->type == 3) {
            if (Vendor::where('phone_no', $request->number)->exists()) {
                return response()->json([
                    'status' => 201,
                    'message' => 'Vendor with this number already exists.',
                ], 409);
            }

            $unverified = UnverifyVendor::where('phone_no', $request->number)->first();

            if (!$unverified) {
                return response()->json([
                    'status' => 201,
                    'message' => 'Vendor not found',
                ], 404);
            }

            $vendor = Vendor::create([
                'name'          => $unverified->name,
                'business_name' => $unverified->business_name,
                'phone_no'      => $unverified->phone_no,
                'email'         => $unverified->email,
                'depot_id'      => $unverified->depot_id,
                'state_id'      => $unverified->state_id,
                'city_id'       => $unverified->city_id,
                'gst_no'        => $unverified->gst_no ?? '',
                'status'        => 1,
            ]);

            $unverified->delete(); // Remove unverified record

            $token = $vendor->createToken('auth')->plainTextToken;

            return response()->json([
                'status' => 200,
                'message' => 'Vendor verified and registered successfully',
                'token' => $token,
                'user' => $vendor,
            ]);
        }

        // ✅ Type 1/2: User registration
        if (User::where('phone', $request->number)->exists()) {
            return response()->json([
                'status' => 201,
                'message' => 'User with this number already exists.',
            ], 409);
        }

        $unverified = UnverifyUser::where('phone', $request->number)->first();

        if (!$unverified) {
            return response()->json([
                'status' => 201,
                'message' => 'User not found',
            ], 404);
        }

        $user = User::create([
            'name'          => $unverified->name,
            'email'         => $unverified->email,
            'phone'         => $unverified->phone,
            'type'          => $unverified->type,
            'business_name' => $unverified->business_name,
            'city'          => $unverified->city,
            'address'       => $unverified->address,
            'gst_no'        => $unverified->gst_no,
            'device_id'     => $request->device_id, // ✅ assign device_id here
            'status'        => 1,
        ]);

        $unverified->delete(); // delete temp record

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'User verified and registered successfully',
            'token' => $token,
            'data' => $user,
        ]);
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
        $request->user()->currentAccessToken()->delete();

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

        // 🔍 Check if device_id already exists
        $existingUser = User::where('device_id', $request->device_id)->first();

        if ($existingUser) {
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

        // ➕ Create new user with this device_id
        $user = new User;
        $user->device_id = $request->device_id;
        $user->fcm_token = $request->fcm_token ?? null;
        $user->entry_date = Carbon::now();
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

    
}
