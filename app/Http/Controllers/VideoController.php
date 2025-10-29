<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('artist')
            ->orderByDesc('view_count')
            ->paginate(12);

        return view('videos.index', compact('videos'));
    }

    public function show($id)
    {
        $video = Video::with('artist')->findOrFail($id);

        $video->increment('view_count');

        return view('videos.show', compact('video'));
    }
}
