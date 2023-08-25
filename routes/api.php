<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/request', [Controller::class, 'all_request']);
Route::post('/request', [Controller::class, 'add_request']);
Route::delete('/request/{id}', [Controller::class, 'delete_request']);
Route::patch('/request/{id}', [Controller::class, 'edit_request']);
Route::get('/size', [Controller::class, 'get_size']);
Route::post('/size', [Controller::class, 'edit_size']);