<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ShareLikeController;
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


Route::get('/', [DashboadController::class, 'index'] )->name('dashboard');

Route::post('/share', [ShareController::class, 'store'] )->name('weshare.create')->middleware('auth');
Route::delete('/share/{id}', [ShareController::class, 'destroy'] )->name('weshare.destroy')->middleware('auth');
Route::get('/share/{share}', [ShareController::class, 'show'] )->name('weshare.show')->middleware('auth');
Route::get('/share/{share}/edit', [ShareController::class, 'edit'] )->name('weshare.edit')->middleware('auth');
Route::put('/share/{share}', [ShareController::class, 'update'] )->name('weshare.update')->middleware('auth');

Route::post('/share/{share}/comments', [CommentController::class, 'store'] )->name('weshare.comments.store')->middleware('auth');


Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::resource('users', UserController::class)->only('show');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');


Route::post('users/{user}/follow', [FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('shares/{share}/like', [ShareLikeController::class,'like'])->middleware('auth')->name('shares.like');
Route::post('shares/{share}/unlike', [ShareLikeController::class,'unlike'])->middleware('auth')->name('shares.unlike');
