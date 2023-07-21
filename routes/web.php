<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/post/view/{id}', [PostController::class, 'view'])-> name('post.view');
Route::get('/user', [PostController::class, 'user'])-> name('post.show');
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);
Route::get('/post/{id}', [PostController::class, 'edit']);
Route::put('/post/{id}', [PostController::class, 'update']);

Auth::routes();

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin-page',[App\Http\Controllers\HomeController::class, 'indexAdmin'])->middleware('role:admin')->name('admin.page');
Route::get('user-page', [App\Http\Controllers\HomeController::class, 'indexUser'])->middleware('role:user')->name('user.page');
