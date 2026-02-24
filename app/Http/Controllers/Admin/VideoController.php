<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Artist;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.videos', [
            'videos'  => Video::with('artist')->latest()->get(),
            'artists' => Artist::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'video'     => 'required|file|mimes:mp4,mov,avi|max:204800',
        ]);

        $path = $request->file('video')->store('videos', 'public');

        Video::create([
            'name'       => $request->name,
            'artist_id'  => $request->artist_id,
            'video_path' => 'storage/' . $path,
            'view_count' => 0,
        ]);

        return back()->with('success', 'Video uploaded.');
    }

    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return back()->with('success', 'Video deleted.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name'      => 'required|string|max:255',
        'artist_id' => 'required|exists:artists,id',
    ]);

    $video = Video::findOrFail($id);
    $video->name      = $request->name;
    $video->artist_id = $request->artist_id;

    if ($request->hasFile('cover')) {
        $path = $request->file('cover')->store('covers', 'public');
        $video->cover_path = 'storage/' . $path;
    }

    $video->save();

    return back()->with('success', 'Video updated.');
}
}