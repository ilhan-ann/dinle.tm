<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $artist = Artist::where('name', 'CITI3EN')->first();

        Song::create([
            'name' => 'Tokyo Drift',
            'audio_path' => 'storage/songs/TOKYODRIFT.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1312,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => '25 Yaly',
            'audio_path' => 'storage/songs/25yaly.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1312,
        ]);

    }
}
