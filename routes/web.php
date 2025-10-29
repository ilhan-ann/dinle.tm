<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TrendsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/search', [SearchController::class,'index'])->name('search');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/category/{id}', [HomeController::class, 'categories_show'])->name('categories.show');
Route::get('/songs/{id}', [HomeController::class, 'songs_show'])->name('songs.show');
Route::get('/artist/{id}', [HomeController::class, 'artists_show'])->name('artists.show');
Route::get('/about-us', [HomeController::class, 'aubout_us'])->name('about.us');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/trends', [TrendsController::class, 'index'])->name('trends.index');