<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\Top\TopController::class, 'index']);

Route::prefix('admin')->middleware(['auth','isAdmin']) -> group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('property', [App\Http\Controllers\Admin\PropertyController::class, 'index']);
    Route::get('add-properties', [App\Http\Controllers\Admin\PropertyController::class, 'create']);
    Route::post('add-properties', [App\Http\Controllers\Admin\PropertyController::class, 'store']);
    Route::get('edit-property/{property_id}', [App\Http\Controllers\Admin\PropertyController::class, 'edit']);
    Route::put('update-property/{property_id}', [App\Http\Controllers\Admin\PropertyController::class, 'update']);
    Route::get('delete-property/{property_id}', [App\Http\Controllers\Admin\PropertyController::class, 'destroy']);

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    
});