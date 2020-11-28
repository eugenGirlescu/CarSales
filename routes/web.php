<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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

Route::get("/cars/create", [App\Http\Controllers\CarsController::class, 'create'])->name('cars.create')->middleware(['role:admin,normal']);

Route::get('/cars', [App\Http\Controllers\CarsController::class, 'index'])->name('cars.index');

Route::get('/redirect', [App\Http\Controllers\CarsController::class, 'redirect']);

Route::get('/admin', [App\Http\Controllers\CarsController::class, 'admin'])->name('admin')->middleware(['role:admin,normal']);

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::get('/change-admin', [AdminController::class,'showChangeForm'])->name('change');

Route::post('/change-admin', [AdminController::class,'changeAdmin']);

Route::get('/contact', [ContactController::class,'showContactForm'])->name('contact');