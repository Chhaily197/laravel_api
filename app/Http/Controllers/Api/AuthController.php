<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $req){
        $user = Users::create([
            'username' => $req->username,
            'email' => $req->email,
            'photo' => $req->photo,
            'password' => Hash::make($req->password),
            'api_token' => Str::random(60),
        ]);
        $token = $user->createToken('API Token')->accessToken;
        $cookie = cookie('api_token', $token, 60* 24 * 365);

        return response(['token' => $token])->withCookie($cookie);
    }

    public function login(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            $user = Auth::users();
            $token = $user->createToken('API Token')->accessToken;
            $cookie = cookie('api_token', $token, 60 * 24 * 365);

            return response(['token', $token])->withCookie($cookie);
        }
        return response(['error' => 'Unauthorized'], 401);
    }

    public function user(Request $req){
        return $req->users();
    }

    public function logout(Request $req){
        $req->users()->token()->remove();
        $cookie = cookie()->forget('api_token');
        return response(['message' => 'Successfully. logged out.'])->withCookie($cookie);
    }
}
