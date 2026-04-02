<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/users', function () {
    return "Hello World";
});

Route::post('/users', function () {
    return response()->json("Post api hit successfully");
});

// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);

// $documnet({"name":'ahul'},{"name", "dept"});