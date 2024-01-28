<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }
    
    public function register(Request $req){
        $validate = Validator::make($req->all(), [
            'username' => 'required|string|max:255', // Assuming you meant 'username' instead of 'usernme'
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

         $name = $req->input('username');
         $email = $req->input('email');
         $password = $req->input("password");

        $user = Users::create([
            'username' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $credentails = $req->only('email', 'password');

        if(auth()->attempt($credentails)){
            return redirect("/home");
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function login(Request $req){
        $credentails = $req->only('email', 'password');

        if(auth()->attempt($credentails)){
            return redirect('/home');
        }

        return redirect()->back()->widthErrors(['email' => 'invalid credentials'])->withInput();
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
