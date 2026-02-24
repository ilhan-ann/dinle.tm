<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\VideoController;
use App\Http\Controllers\Client\TrendsController;

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
    return view('client.aboutus.aboutus');
})->name('about.us');

Route::get('/team', function () {
    return view('client.aboutus.team');
})->name('team');

Route::get('/contact', function () {
    return view('client.aboutus.contact');
})->name('contact');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/category/{id}', 'categories_show')->name('categories.show');
    Route::get('/songs/{id}', 'songs_show')->name('songs.show');
    Route::get('/artist/{id}', 'artists_show')->name('artists.show');
    Route::post('/songs/{id}/listen', 'increment_listener')->name('songs.listen');
});