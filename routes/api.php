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

Route::delete('/user/{id}', function ($id) {
    return response("Delete: " . $id, 200);
});

Route::put('/user/{id}', function ($id) {
    return response("PUT: " . $id, 200);
});

// API's

Route::get("test", function () {
    p("P function working");
});

Route::post('user/store', 'App\Http\Controllers\Api\UserController@store');
