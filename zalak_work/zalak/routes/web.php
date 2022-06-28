<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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
     return view('dashboard'); 


       
 });

 Route::get('/filterProduct', [HomeController::class, 'filterProduct'])->name('filterProduct');

Route::get('/',[HomeController::class, 'dashboard']);

 Route::resource('admin',AdminController::class);
 Route::resource('category',CategoryController::class);
 Route::resource('product',ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

