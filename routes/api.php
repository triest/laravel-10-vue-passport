<?php

use App\Http\Controllers\Api\PassportAuthController;

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
//Route::middleware('auth:api')->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('tag',TagController::class);
    Route::post('/post/{post}/tag/bulk',[PostController::class,'bulk']);
//});
