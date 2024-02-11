<?php

use Illuminate\Support\Facades\Route;
use Modules\Books\App\Http\Controllers\FacultyController;
use Modules\Books\App\Http\Controllers\SemstersController;
use Modules\Books\App\Http\Controllers\YearController;

Route::get("/years", [YearController::class, 'index'])->name("years");
Route::post('/add', [YearController::class, 'add'])->name('add.year');
Route::post('/edit', [YearController::class, 'editYear'])->name('edit.year');
Route::delete('/delete/:{id}', [YearController::class, 'destroy'])->name('delete.year');

Route::get("/sem", [SemstersController::class, 'index'])->name("sem");
Route::post("/add", [SemstersController::class, 'add'])->name("add.sem");
Route::post("/edit", [SemstersController::class, 'editSem'])->name("edit.sem");
Route::delete("/sem/:{id}", [SemstersController::class, 'destroy'])->name("delete.sem");

Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
Route::post('/add', [FacultyController::class, 'add'])->name('add.faculty');
Route::post('/edit', [FacultyController::class, 'editFaculty'])->name('edit.faculty');
Route::delete('/faculty/:{id}', [FacultyController::class, 'destroy'])->name('delete.faculty');
