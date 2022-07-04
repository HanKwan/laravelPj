<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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

// fresh

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LogoutController::class, 'logout']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login', [LoginController::class, 'index']);

Route::get('/', [ProductsController::class, 'index']);

Route::get('/Fresh/Produce', [ProductsController::class, 'indexGreen']);
Route::get('/Fresh/Meat', [ProductsController::class, 'indexMeat']);
Route::post('/Fresh/Produce/{product}', [ProductsController::class, 'store']);
Route::get('/{category:type}', [ProductsController::class, 'show']);