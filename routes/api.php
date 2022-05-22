<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //SMS Routes
    Route::resource('/sms', App\Http\Controllers\Api\SMSController::class);

    //Customer Routes
    Route::put('/customers/reset-pin', [App\Http\Controllers\Api\CustomerController::class, 'resetPin']);
    Route::put('/customers/update-status', [App\Http\Controllers\Api\CustomerController::class,'updateStatus']);
    Route::resource('/customers', App\Http\Controllers\Api\CustomerController::class);

    //Product Routes
    Route::resource('/products', App\Http\Controllers\Api\ProductController::class);

});
