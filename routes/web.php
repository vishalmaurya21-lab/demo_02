<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

// Route::get('/', function () {
//     return view('/student/home');
// });
Route::get('/', [StudentController::class, 'create']);

Route::controller(StudentController::class)->prefix('/student')->group(function () {
    Route::post('/', 'store')->name('student.store');
    Route::get('/dashboard', 'show')->name('student.show');
});
