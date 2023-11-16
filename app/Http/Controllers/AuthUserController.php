<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;


class AuthUserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
         
            $user = Auth::user();
            $expiration = now()->addMinutes(24 * 60); 
            $customClaims = ['exp' => $expiration->timestamp];
            $token = JWTAuth::claims($customClaims)->attempt($credentials);
            
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function logout(Request $request)
    {
        try {
            // Get the token from the request
            $token = JWTAuth::parseToken();

            // Check if the token exists
            if (!$token->getPayload()) {
                return response()->json(['error' => 'Token not provided'], 401);
            }

            // Invalidate the token
            $token->invalidate();

            return response()->json(['message' => 'Successfully logged out']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Failed to logout'], 500);
        }
    }

    public function showProfile(Request $request)
    {
       
           return response()->json(['success'=>true,'details' => $request->user()]);
       
    }
    
    
    public function updateProfile(Request $request)
    {
        $user = $request->user();
       
      
        $user->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);
        
         return response()->json([
            'message' => 'Profile updated successfully',
        ]);
        
    }

    public function showSettings(Request $request)
    {
        return response()->json([
            'settings' => $request->user()->settings,
        ]);
    }

    public function updateSettings(Request $request)
    {
        $user = $request->user();
        $user->settings = $request->all();
        $user->save();

        return response()->json([
            'message' => 'Settings updated successfully',
        ]);
    }

    public function refresh() 
    {
        try {
            if (!$token = auth()->getToken()) {
                throw new NotFoundHttpException('Token Does Not Exist');
           }

           return $this->respondWithToken(auth()->refresh($token));
        } catch (JWTException $e) {
            throw $e;
        }
       
    }

}
