<?php

use App\Http\Controllers\Api\Admin\AdminBrandController;
use App\Http\Controllers\Api\Admin\AdminCategoryController;
use App\Http\Controllers\Api\Admin\AdminIndexController;
use App\Http\Controllers\Api\Admin\AdminProductController;
use App\Http\Controllers\Api\Admin\AdminSubcategoryController;
use App\Http\Controllers\Api\IndexController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::resource('/product', AdminProductController::class);
    Route::resource('/subcategory', AdminSubcategoryController::class);
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/brand', AdminBrandController::class);
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
