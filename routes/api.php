<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\AuthController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/blog', [BlockController::class, 'getBlock']);
Route::get('/sliders', [BlockController::class, 'getAllSliders']);
Route::get('/sliders1', [BlockController::class, 'getAllSliders1']);
Route::get('/categories', [BlockController::class, 'getAllCategories']);
Route::post('/products-by-category', [BlockController::class, 'getProductsByCategory']);
Route::get('/depots', [BlockController::class, 'getAllDepots']);

Route::post('get-stock-col/{name}', [AuthController::class, 'test']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);




Route::get('/states', [AuthController::class, 'getAllStates']);
Route::get('/stock-col', [AuthController::class, 'stockCol']);
Route::get('/sni-price', [AuthController::class, 'sniprice']);
Route::post('/cities-by-state', [AuthController::class, 'getCitiesByState']);


Route::post('/login/request-otp', [AuthController::class, 'loginRequestOtp']);
Route::post('/login/verify-otp', [AuthController::class, 'loginVerifyOtp']);
Route::post('/deviceid-update', [AuthController::class, 'deviceidupdate']);
