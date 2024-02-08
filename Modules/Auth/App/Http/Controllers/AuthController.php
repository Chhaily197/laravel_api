<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   
    public function showRegisterForm(){
        return view('auth::register');
    }

    public function showLogin(){
        return view('auth::index');
    }
    
    public function register(Request $req){
        $validate = Validator::make($req->all(), [
            'profile_image' => 'image|mimes:png,jpg,gif|max:2048',
            'username' => 'required|string|max:255', 
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        if($validate->fails()){
            return redirect()->route('form.register');
        }
         if($req->hasFile('profile_image')){
            $imagePath = $req->file('profile_image')->store('profile_images', 'public');
         }

         $image = $imagePath;
         $name = $req->input('username');
         $email = $req->input('email');
         $password = $req->input("password");

        $user = Users::create([
            'photo' => $image, 
            'username' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $user->save();

        $credentials = $req->only('email', 'password');

        if(auth()->attempt($credentials)){
            return redirect()->route('HomePage')->with('success', "Profile created");
        }else{
            return redirect()->route("form.register")->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function login(Request $req){
        $credentials = $req->only('email', 'password');

        if(auth()->attempt($credentials)){
            return redirect()->route('HomePage')->with('success','Login successfully');
        }else{
            return redirect()->route('form.login')->with('Email invalid');
        }

    }

    public function profile(){
        $user = auth()->User();
        return view('auth::profile', compact('user'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('form.login');
    }

}
