<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('account', AccountController::class);
    Route::group(['prefix' => 'account/{account}'], function () {
        Route::post('/message', [MessageController::class, 'send']);
        Route::post('/message/validate', [MessageController::class, 'validate']);
    });
});
