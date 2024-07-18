<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Auth必要
Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'user'], function () {
        // ログアウト
        Route::delete('logout', [AuthController::class, 'logout']);
    });
});

//Auth不要
Route::group(['prefix' => 'user'], function () {
    //ユーザ登録
    Route::post('register', [UserRegisterController::class, 'userRegister']);
});