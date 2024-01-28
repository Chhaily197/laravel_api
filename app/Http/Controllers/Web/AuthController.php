<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }
    
    public function register(Request $req){
        $user = new User();
        $user::create([
            'username' => $req->input('username'),
        ]);
    }
}
