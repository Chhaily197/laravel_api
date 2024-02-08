<?php

use Illuminate\Support\Facades\Route;
use Modules\Books\App\Http\Controllers\BooksController;
use Modules\Books\App\Http\Controllers\YearController;

Route::group([], function () {
    Route::resource('books', BooksController::class)->names('books');
    Route::get("/years", [YearController::class, 'index'])->name("years");
    Route::post('/add', [YearController::class, 'add'])->name('add.year');
});
