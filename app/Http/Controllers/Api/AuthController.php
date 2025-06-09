<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\UnverifyUser;
use App\Models\UnverifyVendor;
use App\Models\Otp;

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
                'status' => false,
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
                'status' => true,
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
                'status' => 0,  // Assuming 0 = unverified/pending
            ];

            $user = UnverifyUser::create($userData);

            // Save OTP
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
                'status' => true,
                'message' => 'User registered successfully. OTP sent.',
                'data' => $user,
                'otp' => $otpCode  // For testing only
            ]);
        }
    }


}
