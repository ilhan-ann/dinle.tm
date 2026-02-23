<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\VideoController;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('guest:admin')->group(function () {
            Route::get('login',  [LoginController::class, 'create'])->name('login');
            Route::post('login', [LoginController::class, 'store'])->name('login.store');
        });
        Route::middleware('auth:admin')->group(function () {
            Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

            Route::get('', [DashboardController::class, 'index'])->name('dashboard');
            Route::controller(CategoryController::class)
                ->prefix('categories')->name('categories.')
                ->group(function () {
                    Route::get('',          'index')->name('index');
                    Route::post('',         'store')->name('store');
                    Route::delete('/{id}',  'destroy')->name('destroy');
                });
            Route::controller(ArtistController::class)
                ->prefix('artists')->name('artists.')
                ->group(function () {
                    Route::get('',          'index')->name('index');
                    Route::post('',         'store')->name('store');
                    Route::delete('/{id}',  'destroy')->name('destroy');
                });
            Route::controller(SongController::class)
                ->prefix('songs')->name('songs.')
                ->group(function () {
                    Route::get('',          'index')->name('index');
                    Route::post('',         'store')->name('store');
                    Route::delete('/{id}',  'destroy')->name('destroy');
                });
            Route::controller(VideoController::class)
                ->prefix('videos')->name('videos.')
                ->group(function () {
                    Route::get('',          'index')->name('index');
                    Route::post('',         'store')->name('store');
                    Route::delete('/{id}',  'destroy')->name('destroy');
                });
        });
    });