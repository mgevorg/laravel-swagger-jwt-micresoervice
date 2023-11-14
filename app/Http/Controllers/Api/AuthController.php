<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api')->except('login');
    }

    public function login(Request $request)
    {
        $credidentals = $request->only(['email', 'password']);
        if(!$token = auth('api')->attempt($credidentals)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    public function user()
    {
        return response()->json(auth('api')->user());
    }
    public function logout()
    {
        return response()->json(auth('api')->logout());
    }
    public function refresh()
    {
//        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'type' => 'bearer',
            'expires_in' => Config::get('jwt.ttl') * 6000
        ], 401);
    }
}
