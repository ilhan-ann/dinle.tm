<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('artist')
            ->orderByDesc('view_count')
            ->paginate(12);

        return view('client.videos.index', compact('videos'));
    }

    public function show($id)
    {
        $video = Video::with('artist')->findOrFail($id);

        $video->increment('view_count');

        return view('client.videos.show', compact('video'));
    }
}