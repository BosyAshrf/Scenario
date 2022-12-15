<?php

use App\Http\Controllers\AdminsController;
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
Route::middleware(['auth:web,service'])->group(function(){
    Route::resource('orders', OrderController::class);
    Route::resource('providers', ProvidersController::class);
    Route::get('ShowUser', [AdminsController::class, 'ShowUser'])->name('show.user');
    Route::get('ShowProvider', [AdminsController::class, 'ShowProvider'])->name('show.Provider');
    Route::get('ShowOrder', [AdminsController::class, 'ShowOrder'])->name('show.Order');
    Route::delete('deleteProvider/{id}', [AdminsController::class, 'deleteProvider'])->name('admin.delete');
    Route::delete('deleteUser/{id}', [AdminsController::class, 'deleteUser'])->name('admin.deleteUser');

});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   

});

require __DIR__.'/auth.php';
