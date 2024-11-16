<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WelcomeController;
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

Route::resource('/', WelcomeController::class);
Route::resource('/user_dashboard', UserDashboardController::class);
Route::post('/signup', [WelcomeController::class, 'signup']);
Route::get('/logout', [LogoutController::class, 'index']);
