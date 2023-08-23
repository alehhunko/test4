<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('main');

Route::get('/adminpanel', [App\Http\Controllers\Controller::class, 'admin'])->name('admin');

Route::get('/singin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');