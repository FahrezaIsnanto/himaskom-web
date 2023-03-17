<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\OnlyAdminMiddleware;
use App\Http\Middleware\OnlyGuestMiddleware;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->middleware([OnlyGuestMiddleware::class]);
    Route::post('/', [AuthController::class, 'store'])->middleware([OnlyGuestMiddleware::class]);
    Route::delete('/', [AuthController::class, 'destroy']);
});


Route::middleware([OnlyAdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::get('/create', [AdminController::class, 'create']);
            Route::post('/', [AdminController::class, 'store']);
            Route::get('/{id}/edit', [AdminController::class, 'edit']);
            Route::put('/{id}', [AdminController::class, 'update']);
            Route::delete('/{id}', [AdminController::class, 'destroy']);
        });

        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index']);
            Route::get('/create', [NewsController::class, 'create']);
            Route::post('/', [NewsController::class, 'store']);
            Route::get('/{id}/edit', [NewsController::class, 'edit']);
            Route::post('/{id}/update', [NewsController::class, 'update']);
            Route::delete('/{id}', [NewsController::class, 'destroy']);
        });

        Route::prefix('division')->group(function () {
            Route::get('/', [DivisionController::class, 'index']);
            Route::get('/create', [DivisionController::class, 'create']);
            Route::post('/', [DivisionController::class, 'store']);
            Route::get('/{id}/edit', [DivisionController::class, 'edit']);
            Route::post('/{id}/update', [DivisionController::class, 'update']);
            Route::delete('/{id}', [DivisionController::class, 'destroy']);
        });
    });
