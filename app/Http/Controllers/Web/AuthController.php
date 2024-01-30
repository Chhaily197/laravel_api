<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
            'profile_image' => 'image|mimes:png,jpg,gif|max:2048',
            'username' => 'required|string|max:255', 
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
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
        }

        return redirect()->route("register")->withErrors(['email' => 'Invalid email or password']);
    }

    public function login(Request $req){
        $credentials = $req->only('email', 'password');

        if(auth()->attempt($credentials)){
            return redirect()->route('HomePage')->with('success','Login successfully');
        }

        return redirect()->route('/')->widthErrors(['email' => 'invalid credentials']);
    }

    public function profile(){
        $user = auth()->User();
        return view('auth.profile', compact('user'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
