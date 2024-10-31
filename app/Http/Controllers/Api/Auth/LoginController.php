<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $user = Auth::user();
            
            $tokenName = $request->device_name 
                ?? $request->header('User-Agent', 'unknown-device')
                . '-' . now()->timestamp;

            $token = $user->createToken($tokenName)->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 401);
    }

    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            // Check if user is actually authenticated
            if (!$request->user()) {
                return response()->json([
                    'message' => 'No active session found'
                ], 401);
            }
    
            // Check if there's an active token
            if (!$request->user()->currentAccessToken()) {
                return response()->json([
                    'message' => 'No active token found'
                ], 401);
            }
    
            // Revoke the token
            $request->user()->currentAccessToken()->delete();
    
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
    
        } catch (\Exception $e) {
            // Log the error if you have logging configured
            \Log::error('Logout error: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'An error occurred during logout',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }
}