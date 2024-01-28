<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\AuthController;


Route::middleware('guest')->group(function(){
    Route::get("/register", [AuthController::class, 'showRegisterForm'])->name("register");
    Route::post("/register", [AuthController::class, 'register']);

    Route::get("/login", [AuthController::class, 'showLogin'])->name("login");
    Route::post("/login", [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::get("/home", [MainController::class, 'index'])->name("HomePage");
    Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
});

Route::fallback([AuthController::class, 'showLogin']);