<?php

use App\Http\Controllers\backend\latestnewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backhend\BannerController;
use App\Http\Controllers\backhend\catagories;
use App\Http\Controllers\backhend\news;
use App\Http\Controllers\frontend\frontController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\NewsController;

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

Route::get('/',[frontController::class,'index'])->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Banner route;

Route::resource('/Categories',catagories::class);

Route::resource('/news',NewsController::class);

Route::resource('/banner', BannerController::class);

Route::resource('/LATEST_NEWS',latestnewsController::class);
