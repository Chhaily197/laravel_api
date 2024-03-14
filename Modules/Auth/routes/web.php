<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\AuthController;

Route::middleware(['throttle.login'])->group(function(){
    Route::get("/register", [AuthController::class, 'showRegisterForm'])->name("form.register");
    Route::post("/register", [AuthController::class, 'register'])->name('register');
    Route::get("/", [AuthController::class, 'showLogin'])->name('form.login');
    Route::post("/login", [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
});

Route::fallback([AuthController::class, 'showLogin']);