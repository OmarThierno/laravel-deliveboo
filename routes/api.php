<?php

use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OpenAiHandlerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypologyController;
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

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show']);

Route::get('/typologies', [TypologyController::class, 'index']);
Route::get('/dishes', [DishController::class, 'index']);

Route::get('/orders/generate', [OrderController::class, 'generate']);
Route::post('/orders/checkout', [OrderController::class, 'makePayment']);

Route::post('save', [OrderController::class, 'store']);

Route::post('/chat', [OpenAiHandlerController::class, 'chat']);