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
            'cover'       => 'nullable|image|max:5120',
        ]);

        $path = $request->file('audio')->store('songs', 'public');

        $data = [
            'name'           => $request->name,
            'artist_id'      => $request->artist_id,
            'category_id'    => $request->category_id,
            'audio_path'     => 'storage/' . $path,
            'listener_count' => 0,
        ];

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $data['cover_path'] = 'storage/' . $coverPath;
        }

        Song::create($data);

        return back()->with('success', 'Song uploaded.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'artist_id'   => 'required|exists:artists,id',
            'category_id' => 'required|exists:categories,id',
            'cover'       => 'nullable|image|max:5120',
        ]);

        $song = Song::findOrFail($id);
        $song->name        = $request->name;
        $song->artist_id   = $request->artist_id;
        $song->category_id = $request->category_id;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $song->cover_path = 'storage/' . $coverPath;
        }

        $song->save();

        return back()->with('success', 'Song updated.');
    }

    public function destroy($id)
    {
        Song::findOrFail($id)->delete();
        return back()->with('success', 'Song deleted.');
    }
}