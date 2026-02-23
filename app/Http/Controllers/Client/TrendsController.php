<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

class TrendsController extends Controller
{
    public function index()
    {
        $trendingSongs = Song::with('artist')
            ->orderByDesc('listener_count')
            ->take(10)
            ->get();

        return view('client.trends.index', [
            'songs' => $trendingSongs,
        ]);
    }
}