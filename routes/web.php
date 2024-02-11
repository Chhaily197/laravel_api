<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MainController;

Route::middleware(['guest'])->group(function(){
    include_once __DIR__.'/../Modules/Books/routes/web.php';
    include_once __DIR__.'/../Modules/Cryption/routes/web.php';
    include_once __DIR__.'/../Modules/Auth/routes/web.php';
});


Route::middleware(['auth'])->group(function(){

});

Route::get("/home", [MainController::class, 'index'])->name("HomePage");
Route::get('/change-lang', [MainController::class, 'changeLanguage'])->name('change-lang');
