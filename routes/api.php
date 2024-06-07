<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/me', function () {
    return response()->json(['name' => 'Deepjyoti Baishya', 'email' => 'deepjyoti120281@gmail.com']);
});

Route::get('/users', [UserController::class, 'getUsers']);