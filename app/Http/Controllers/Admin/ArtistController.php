<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        return view('admin.artists', [
            'artists' => Artist::withCount('songs')->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Artist::create(['name' => $request->name]);
        return back()->with('success', 'Artist created.');
    }

    public function destroy($id)
    {
        Artist::findOrFail($id)->delete();
        return back()->with('success', 'Artist deleted.');
    }
}