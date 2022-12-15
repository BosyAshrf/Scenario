<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\OrderController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login-customer', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);
   
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('customers', CustomersController::class);
    // Route::resource('orderCustomers', OrderController::class); 
    Route::post('orderCustomers',[OrderController::class,'AddOrder']);
    Route::delete('cancelOrder/{id}',[OrderController::class,'cancelOrder']);
    // Route::get('showOrder/{id}',[OrderController::class,'showOrder']);
    Route::get('showOrder',[OrderController::class,'showOrder']);

});


