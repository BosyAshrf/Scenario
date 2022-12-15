<?php


use App\Http\Controllers\Auth\ServiceLoginController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::middleware('guest')->group(function () {

 Route::get('login-service', [ServiceLoginController::class, 'create'])
    ->name('login.service');

Route::post('login-service', [ServiceLoginController::class, 'store'])->name('service.login');
});

Route::middleware('auth:service')->group(function () {
    Route::post('logout/service', [ServiceLoginController::class, 'destroy'])
        ->name('logout.service');

      
});

Route::get('/dashboard/service', function () {
    return view('Services.dashboard');
})->middleware(['auth:service'])->name('dashboard/service');
