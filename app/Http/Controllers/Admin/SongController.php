<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        return view('admin.songs', [
            'songs'      => Song::with(['artist', 'category'])->latest()->get(),
            'artists'    => Artist::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'artist_id'   => 'required|exists:artists,id',
            'category_id' => 'required|exists:categories,id',
            'audio'       => 'required|file|mimes:mp3,wav,ogg|max:51200',
        ]);

        $path = $request->file('audio')->store('songs', 'public');

        Song::create([
            'name'           => $request->name,
            'artist_id'      => $request->artist_id,
            'category_id'    => $request->category_id,
            'audio_path'     => 'storage/' . $path,
            'listener_count' => 0,
        ]);

        return back()->with('success', 'Song uploaded.');
    }

    public function destroy($id)
    {
        Song::findOrFail($id)->delete();
        return back()->with('success', 'Song deleted.');
    }
}