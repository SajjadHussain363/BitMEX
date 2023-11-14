<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthUserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
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
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function showProfile(Request $request)
    {
        if($request)
        {
            return response()->json([
                'user' => $request->user(),
            ]);
        }
        else
        {
            return response()->json([
                'user' => 'Token has expired',
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $user->update($request->all());

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
