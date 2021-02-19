<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\LaboratoryController as LaboratoryController;
use App\Http\Controllers\Admin\ReportController as ReportController;
use App\Http\Controllers\Admin\ReportDetailController as ReportDetailController;
use App\Models\Laboratory;

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
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('laboratory')->group(function(){
        Route::get('/', [LaboratoryController::class, 'index'])->name('laboratory.index');
        Route::get('/create', [LaboratoryController::class, 'create'])->name('laboratory.create');
        Route::post('/create', [LaboratoryController::class, 'store'])->name('laboratory.store');
        Route::get('/{laboratory}/edit', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
        Route::put('/{laboratory}', [LaboratoryController::class, 'update'])->name('laboratory.update');
        Route::delete('{laboratory}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');
    });

    Route::prefix('report')->group(function(){
        Route::get('/', [ReportController::class, 'index'])->name('report.index');
        Route::get('/create', [ReportController::class, 'create'])->name('report.create');
        Route::post('/create', [ReportController::class, 'store'])->name('report.store');
        Route::get('/{report}', [ReportController::class, 'show'])->name('report.show');
    });

    Route::prefix('report-detail')->group(function(){
        Route::get('{report_id}/create', [ReportDetailController::class, 'create'])->name('detail.create');
        Route::post('{report_id}/create', [ReportDetailController::class, 'store'])->name('detail.store');
        Route::get('{detail_id}', [ReportDetailController::class, 'destroy'])->name('detail.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
