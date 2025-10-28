<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Song;

class HomeController extends Controller
{
    public function index()
    {
         $categories = Category::get();
         $songs = Song::take(8);

        return view('home.index')->with([
            'categories' => $categories,
            'songs' => $songs,
        ]);
    }

    public function categories_show($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $song = Song::where('category_id', $id)->get();

        return view('home.show')->with([
            'category' => $category,
            'songs' => $song,
        ]);
    }
    public function songs_show($id)
    {
        $song = Song::where('id', $id)->firstOrFail();

        return view('songs.show')->with([
            'song' => $song,
        ]);
    }
    public function artists_show($id)
    {
        $artist = Artist::where('id', $id)->firstOrFail();
        $song = Song::where('artist_id', $id)->get();

        return view('artists.show')->with([
            'artist' => $artist,
            'songs' => $song,
        ]);
    }
}
