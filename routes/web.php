<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;

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
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
