<?php

use Illuminate\Support\Facades\Route;
use Modules\Blogs\App\Http\Controllers\BlogsController;

Route::group([], function () {
    Route::resource('blogs', BlogsController::class)->names('blogs');
    Route::get('homePage', [BlogsController::class, 'homePage'])->name('homePage');
});
