<?php

use App\Http\Controllers\AuthController;
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
Route::post('/logins', [UserController::class, 'logins']);
Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'getUser']);
});

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/register', [AuthController::class,'register']);
});
Route::middleware('auth:api')->group(function () {
    Route::post('me', [AuthController::class,'me']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
});
$routes = glob(__DIR__ . "/api/*.php");
foreach ($routes as $route) require($route);