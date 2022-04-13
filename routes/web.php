<?php

use App\Models\Category;
use App\Models\Note;
use App\Models\UserCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


Route::get('/', function () {
    //return view('Notes/index');
});

Route::group(['prefix' => ''], function () {
    $methods = ['index'/*, 'edit', 'update', 'create', 'store', 'destroy'*/];
    Route::resource('note', \App\Http\Controllers\NoteController::class)
        ->only($methods)
        ->names('note');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
