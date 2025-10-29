<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TrendsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('songs')->group(function () {
    Route::get('/{id}', [HomeController::class, 'songs_show'])->name('songs.show');
});
Route::prefix('artist')->group(function () {
    Route::get('/{id}', [HomeController::class, 'artists_show'])->name('artists.show');
});
Route::prefix('category')->group(function () {
    Route::get('/{id}', [HomeController::class, 'categories_show'])->name('categories.show');
});
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/trends', [TrendsController::class, 'index'])->name('trends.index');