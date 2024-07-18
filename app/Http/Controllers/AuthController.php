<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        
        $token = JWTAuth::attempt($credentials);
        
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function refresh(Request $request)
    {
        $token = $request->bearerToken();
        
        if ($token) {
            try {
                $newToken = JWTAuth::setToken($token)->refresh();
                return response()->json(['token' => $newToken], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Could not refresh token'], 401);
            }
        } else {
            return response()->json(['error' => 'No token provided'], 400);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        
        if ($token) {
            JWTAuth::invalidate($token);
            return response()->json(['message' => 'Successfully logged out'], 200);
        } else {
            return response()->json(['error' => 'No token provided'], 400);
        }
    }
}