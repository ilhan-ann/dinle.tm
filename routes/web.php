<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TrendsController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/category/{id}', 'categories_show')->name('categories.show');
    Route::get('/songs/{id}', 'songs_show')->name('songs.show');
    Route::get('/artist/{id}', 'artists_show')->name('artists.show');
});

Route::controller(SearchController::class)->group(function () {
    Route::get('/search', 'index')->name('search');
});

Route::controller(VideoController::class)->group(function () {
    Route::get('/videos', 'index')->name('videos.index');
    Route::get('/videos/{id}', 'show')->name('videos.show');
});

Route::controller(TrendsController::class)->group(function () {
    Route::get('/trends', 'index')->name('trends.index');
});

Route::get('/about-us', function () {
    return view('aboutus.aboutus');
})->name('about.us');

Route::get('/team', function () {
    return view('aboutus.team');
})->name('team');

Route::get('/contact', function () {
    return view('aboutus.contact');
})->name('contact');