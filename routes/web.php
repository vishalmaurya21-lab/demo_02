<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

// Route::get('/', function () {
//     return view('/student/home');
// });
Route::get('/', [StudentController::class, 'create'])->name('home');

Route::controller(StudentController::class)->prefix('/student')->group(function () {
    Route::post('/', 'store')->name('student.store');
    Route::get('/dashboard', 'show')->name('student.show');
    Route::get('/edit/{id}', 'edit')->name('student.edit');
    Route::post('/edit/{id}', 'update')->name('student.update');
    Route::get('/logout', 'logout')->name('student.logout');
    Route::get('/delete/{id}', 'delete')->name('student.delete');
});
