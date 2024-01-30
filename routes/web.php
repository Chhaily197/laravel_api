<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\AuthController;


Route::middleware('guest')->group(function(){
    Route::get("/register", [AuthController::class, 'showRegisterForm'])->name("register");
    Route::post("/register", [AuthController::class, 'register']);

    Route::get("/", [AuthController::class, 'showLogin'])->name("/");
    Route::post("/login", [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get("/home", [MainController::class, 'index'])->name("HomePage");
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
});

Route::fallback([AuthController::class, 'showLogin']);