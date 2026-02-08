<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:10'],
            'otp' => ['required', 'string', 'digits:4'],
        ]);

        // Find user by phone number
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // Verify OTP
        if (strval($user->otp) !== $request->otp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired OTP'
            ], 401);
        }

        // Clear OTP after successful verification
        $user->otp = null;
        $user->last_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();

        // Generate access token
        $token = $user->createToken('authToken')->accessToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]
        ],200);
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:10'],
        ]);

        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
        
        // Find or create user
        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            [
                'fullname' => 'User_' . Str::random(8),
                'email' => null,
                'status' => 'active'
            ]
        );

        // Update OTP details
        $user->otp = $otp;
        $user->save();

        // In production, you would send the OTP via SMS here
        // For development, we'll return it in the response
        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully',
            'data' => [
                'otp' => $otp, // Remove this in production
            ]
        ]);
    }
    
    public function logout(Request $request)
    {
        try {
            // Revoke current token
            $request->user()->token()->revoke();            
            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed'
            ], 500);
        }
    }
}
