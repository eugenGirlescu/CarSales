<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\CarsController::class, 'welcomePage'])->name('welcome');

Route::resource('/cars', CarsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/cars/create", [App\Http\Controllers\CarsController::class, 'create'])->name('cars.create')->middleware(['role:0,1']);

Route::get('/cars', [App\Http\Controllers\CarsController::class, 'index'])->name('cars.index');

Route::get('/redirect', [App\Http\Controllers\CarsController::class, 'redirect']);

Route::get('/admin', [App\Http\Controllers\CarsController::class, 'admin'])->name('admin')->middleware(['role:0,1']);