<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = Artist::where('name', 'CITI3EN')->first();

        Video::create([
            'name' => 'Tokyo Drift',
            'video_path' => 'storage/videos/citi3en/tokyodrift.mp4',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'view_count' => 1312,
        ]);
    }
}
