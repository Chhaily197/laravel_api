<?php

use Illuminate\Support\Facades\Route;
use Modules\Cryption\App\Http\Controllers\CryptionController;

Route::group([], function () {
    Route::resource('cryption', CryptionController::class)->names('cryption');
    Route::get("/encryption", [CryptionController::class, 'showForm'])->name('encryption');
    Route::post("/encryption/encrypt", [CryptionController::class, 'encrypt'])->name("encrypt");
    Route::post("/encryption/decrypt", [CryptionController::class, 'decrypt'])->name("decrypt");
});

