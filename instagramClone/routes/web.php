<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Models\Post;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/profile/{user:username}/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{user}', [ProfileController::class, 'update']);
Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store']);
Route::delete('/posts/{post}/unlikes', [PostLikeController::class, 'destroy']);

Route::get('/', function () {
    return view('app');
});