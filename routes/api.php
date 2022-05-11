<?php

use App\Http\Controllers\API\AuthController;
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

Route::prefix('')->namespace('App\Http\Controllers\API')->group(function() {
    Route::post('register', 'AuthController@register');
});

Route::delete('user/delete', [AuthController::class, 'delete']);
Route::post('token', [AuthController::class, 'token']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/notes', \App\Http\Controllers\API\EntityController::class, [
    'except' => ['edit', 'show', 'store', 'destroy']
]);

Route::delete('notes/delete', [\App\Http\Controllers\API\EntityController::class, 'destroy']);
