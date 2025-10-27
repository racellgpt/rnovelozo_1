<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::resource('students', StudentController::class);
Route::resource('sections', SectionController::class);

