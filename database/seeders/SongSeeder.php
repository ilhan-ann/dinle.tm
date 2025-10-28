<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            'name' => 'Tokyo Drift',
            'artist' => 'CITI3EN',
            'audio_path' => 'songs/TOKYO DRIFT.mp3',
            'duration' => '2:00',
            'artist_id' => '2',
            'category_id' => '1',
            'listener_count' => '1312',
        ];

         foreach ($songs as $song) {
            Song::create(['name' => $song]);
        }
    }
}
