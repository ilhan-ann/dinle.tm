<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'categoriesCount' => Category::count(),
            'artistsCount'    => Artist::count(),
            'songsCount'      => Song::count(),
            'videosCount'     => Video::count(),
        ]);
    }
}