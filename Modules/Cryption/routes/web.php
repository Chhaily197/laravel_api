<?php

use Illuminate\Support\Facades\Route;
use Modules\Cryption\App\Http\Controllers\CryptionController;

Route::group([], function () {
    Route::resource('cryption', CryptionController::class)->names('cryption');
});

