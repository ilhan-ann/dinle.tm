<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Song;

class HomeController extends Controller
{
   public function index()
{
    $categories  = Category::withCount('songs')->get();
    $latestSongs = Song::with('artist')->latest()->take(6)->get();
    $artists     = Artist::withCount('songs')->get();

    return view('client.home.index')->with([
        'categories'  => $categories,
        'latestSongs' => $latestSongs,
        'artists'     => $artists,
    ]);
}

    public function categories_show($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $songs    = Song::where('category_id', $id)->get();

        return view('client.home.show')->with([
            'category' => $category,
            'songs'    => $songs,
        ]);
    }

    public function songs_show($id)
    {
        $song = Song::where('id', $id)->firstOrFail();

        return view('client.songs.show')->with([
            'song' => $song,
        ]);
    }

    public function artists_show($id)
    {
        $artist = Artist::where('id', $id)->firstOrFail();
        $songs  = Song::where('artist_id', $id)->get();

        return view('client.artists.show')->with([
            'artist' => $artist,
            'songs'  => $songs,
        ]);
    }

    public function increment_listener($id)
{
    $song = Song::findOrFail($id);
    $song->increment('listener_count');
    return response()->json(['listener_count' => $song->listener_count]);
}
}