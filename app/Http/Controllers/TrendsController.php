<?php

namespace App\Http\Controllers;

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

        return view('trends.index', [
            'songs' => $trendingSongs
        ]);
    }
}
