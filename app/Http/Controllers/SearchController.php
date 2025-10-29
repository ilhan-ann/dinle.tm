<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Song;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string'],
            'categoryId' => ['nullable', "integer", "min:1"],
            'artistId' => ['nullable', "integer", "min:1"],
        ]);

        $f_q = $request->q ? $request->q : null;
        $f_category = $request->categoryId ? $request->categoryId : 0;
        $f_artist = $request->artistId ? $request->artistId : 0;

        $songs = Song::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('name', 'like', '%' . $f_q . '%')
                    ->orWhere('name', 'like', '%' . $f_q . '%');
            })
                ->orWhereHas('artist', function ($query) use ($f_q) {
                    return $query->where('name', 'like', '%' . $f_q . '%');
                })
                ->orWhereHas('category', function ($query) use ($f_q) {
                    return $query->where('name', 'like', '%' . $f_q . '%');
                });
        })
            ->when($f_category, function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->when($f_artist, function ($query) use ($f_artist) {
                return $query->where('artist_id', $f_artist);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();



        $categories = Category::get();
        $artists = Artist::get();

        return view('search.index')->with([
            'songs' => $songs,
            'categories' => $categories,
            'artists' => $artists,
            'f_q' => $f_q,
            'f_category' => $f_category,
            'f_artist' => $f_artist,
        ]);
    }
}
