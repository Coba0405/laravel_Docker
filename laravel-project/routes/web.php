<?php

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

Route::get('/', function () {

    \Illuminate\Support\Facades\Log::info('New log entry created.');

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts','App\Http\Controllers\PostController', ['only' => ['index','show','create','store','destroy']]);
Route::get('posts/edit/{id}', 'PostController@edit');
Route::post('posts/edit/{id}', 'PostController@update');
Route::post('posts/delete/{id}', 'PostController@destroy');