<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
Route::group(['middleware' => 'localization'], function () {

Route::resource('tasks', TaskController::class);


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('change-language/{language}',[HomeController::class, 'changeLanguage'])->name('change-language');
});
