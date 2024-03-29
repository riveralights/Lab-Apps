<?php

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\LaboratoryController as LaboratoryController;
use App\Http\Controllers\Admin\ReportController as ReportController;
use App\Http\Controllers\Admin\ReportDetailController as ReportDetailController;
use App\Http\Controllers\Admin\InventoryController as InventoryController;
use App\Http\Controllers\Admin\SettingController as SettingController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\PasswordController as PasswordController;

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
    return redirect(route('dashboard'));
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
        Route::get('/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
        Route::put('/{report}', [ReportController::class, 'update'])->name('report.update');
        Route::delete('{report}', [ReportController::class, 'destroy'])->name('report.destroy');
        Route::get('/{report}/print', [ReportController::class, 'personalPrint'])->name('report.personalprint');
        Route::post('/filter/print', [ReportController::class, 'monthlyReport'])->name('report.monthly');
    });

    Route::prefix('report-detail')->group(function(){
        Route::get('{report_id}/create', [ReportDetailController::class, 'create'])->name('detail.create');
        Route::post('{report_id}/create', [ReportDetailController::class, 'store'])->name('detail.store');
        Route::get('{detail_id}', [ReportDetailController::class, 'destroy'])->name('detail.destroy');
    });

    Route::prefix('inventory')->group(function(){
        Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/create', [InventoryController::class, 'create'])->name('inventory.create');
        Route::post('/create', [InventoryController::class, 'store'])->name('inventory.store');
        Route::get('/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');
        Route::get('/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
        Route::put('/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
        Route::delete('{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
        Route::post('/filter/print', [InventoryController::class, 'monthlyInventory'])->name('inventory.monthly');
    });

    Route::resource('setting', SettingController::class)->except(['show']);

    Route::get('/password', [PasswordController::class, 'edit'])->name('user.password.edit');
    Route::patch('/password', [PasswordController::class, 'update'])->name('user.password.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');