<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[ AuthController::class,'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('my_category',[ UserController::class,'index'])->middleware('auth:api');


    Route::get('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout',[ AuthController::class,'logout']);
});