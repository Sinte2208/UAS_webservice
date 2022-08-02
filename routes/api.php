<?php

use App\Http\Controllers\CostumersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoomsController;
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

Route::get('password', function(){
    return bcrypt('sinte');
});

route::get('costumers', [CostumersController::class, 'index']);
route::post('costumers', [CostumersController::class, 'store']);
route::get('costumers/{costumers}', [CostumersController::class, 'show']);
route::patch('costumers/{costumers}', [CostumersController::class, 'update']);
route::delete('costumers/{costumers}', [CostumersController::class, 'destroy']);

route::get('orders', [OrdersController::class, 'index']);
route::post('orders', [OrdersController::class, 'store']);
route::get('orders/{orders}', [OrdersController::class, 'show']);
route::patch('orders/{orders}', [OrdersController::class, 'update']);
route::delete('orders/{orders}', [OrdersController::class, 'destroy']);

route::get('rooms', [RoomsController::class, 'index']);
route::post('rooms', [RoomsController::class, 'store']);
route::get('rooms/{rooms}', [RoomsController::class, 'show']);
route::patch('rooms/{rooms}', [RoomsController::class, 'update']);
route::delete('rooms/{rooms}', [RoomsController::class, 'destroy']);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});
