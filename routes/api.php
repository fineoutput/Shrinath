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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog', [BlockController::class, 'getBlock']);
Route::get('/sliders', [BlockController::class, 'getAllSliders']);
Route::get('/sliders1', [BlockController::class, 'getAllSliders1']);
Route::get('/categories', [BlockController::class, 'getAllCategories']);
Route::post('/products-by-category', [BlockController::class, 'getProductsByCategory']);
Route::get('/depots', [BlockController::class, 'getAllDepots']);


Route::post('/register', [AuthController::class, 'register']);


