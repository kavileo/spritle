<?php

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/postlike', [App\Http\Controllers\HomeController::class, 'postlike'])->name('postlike');

Route::post('commentpost',[App\Http\Controllers\HomeController::class, 'commentpost'])->name('commentpost');

Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::post('/poststor', [App\Http\Controllers\HomeController::class, 'poststore'])->name('poststore');
