<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ExploreController;


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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Auth::routes();

Route::redirect('/home', '/')->name('home');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
Route::get('/explore/sport/{id}', [ExploreController::class, 'bySport'])->name('explore.sport');
