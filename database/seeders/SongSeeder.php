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
            'audio_path' => 'storage/songs/citi3en/TOKYODRIFT.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1312,
        ]);


        $artist = Artist::where('name', 'CITI3EN')->first();

        Song::create([
            'name' => 'Soy Diyyar',
            'audio_path' => 'storage/songs/citi3en/SoyDiyyar.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 466,
        ]);

        $artist = Artist::where('name', 'CITI3EN')->first();

        Song::create([
            'name' => 'DRAMA',
            'audio_path' => 'storage/songs/citi3en/drama.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 842,
        ]);

        $artist = Artist::where('name', 'CITI3EN')->first();

        Song::create([
            'name' => '3LEGEND0',
            'audio_path' => 'storage/songs/citi3en/3legend0.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 849,
        ]);

        $artist = Artist::where('name', 'CITI3EN')->first();

        Song::create([
            'name' => 'NAHAR',
            'audio_path' => 'storage/songs/citi3en/NAHAR.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 943,
        ]);





        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => '25 Yaly',
            'audio_path' => 'storage/songs/dalidade/25yaly.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 8433,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'Agam',
            'audio_path' => 'storage/songs/dalidade/Agam.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 483,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'K.N.D.N',
            'audio_path' => 'storage/songs/dalidade/K.N.D.N.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 849,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'Öleli',
            'audio_path' => 'storage/songs/dalidade/Oleli.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 168,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'Ýalňyş Ýerde',
            'audio_path' => 'storage/songs/dalidade/yalnysyerde.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 9525,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'Ýalňyz',
            'audio_path' => 'storage/songs/dalidade/yalnyz.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1467,
        ]);

        $artist = Artist::where('name', 'Dali Dade')->first();

        Song::create([
            'name' => 'Ashak',
            'audio_path' => 'storage/songs/dalidade/ashak.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 17417,
        ]);





        $artist = Artist::where('name', 'Swizzy347')->first();

        Song::create([
            'name' => 'Gidemok Işe',
            'audio_path' => 'storage/songs/swizzy347/gidemokise.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1974,
        ]);

        $artist = Artist::where('name', 'Swizzy347')->first();

        Song::create([
            'name' => 'TOBA',
            'audio_path' => 'storage/songs/swizzy347/TOBA.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 814,
        ]);





        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'MAY',
            'audio_path' => 'storage/songs/abdydayy/may.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 746,
        ]);

        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'IKIGAI',
            'audio_path' => 'storage/songs/abdydayy/ikigai.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 14651,
        ]);

        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'YOL',
            'audio_path' => 'storage/songs/abdydayy/yol.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1561,
        ]);

        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'BAR',
            'audio_path' => 'storage/songs/abdydayy/bar.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 771,
        ]);

        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'Iň Içden',
            'audio_path' => 'storage/songs/abdydayy/inicden.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 5474,
        ]);

        $artist = Artist::where('name', 'Abdy Dayy')->first();

        Song::create([
            'name' => 'Title',
            'audio_path' => 'storage/songs/abdydayy/title.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 819,
        ]);





        $artist = Artist::where('name', 'Taze Yuz')->first();

        Song::create([
            'name' => 'Qatar',
            'audio_path' => 'storage/songs/tazeyuz/qatar.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 498,
        ]);

        $artist = Artist::where('name', 'Taze Yuz')->first();

        Song::create([
            'name' => 'Garagumda',
            'audio_path' => 'storage/songs/tazeyuz/garagumda.mp3',
            'artist_id' => $artist->id,
            'category_id' => 1,
            'listener_count' => 1968,
        ]);





        $artist = Artist::where('name', 'The Weeknd')->first();

        Song::create([
            'name' => 'Starboy',
            'audio_path' => 'storage/songs/theweeknd/starboy.mp3',
            'artist_id' => $artist->id,
            'category_id' => 3,
            'listener_count' => 9441,
        ]);

        $artist = Artist::where('name', 'The Weeknd')->first();

        Song::create([
            'name' => 'Blinding Lights',
            'audio_path' => 'storage/songs/theweeknd/blindinglights.mp3',
            'artist_id' => $artist->id,
            'category_id' => 3,
            'listener_count' => 8435,
        ]);





        $artist = Artist::where('name', 'XXXtentacion')->first();

        Song::create([
            'name' => 'SAD',
            'audio_path' => 'storage/songs/xxxtentacion/sad.mp3',
            'artist_id' => $artist->id,
            'category_id' => 3,
            'listener_count' => 78741,
        ]);





        $artist = Artist::where('name', 'Miyagi')->first();

        Song::create([
            'name' => 'I Got Love',
            'audio_path' => 'storage/songs/miyagi/igotlove.mp3',
            'artist_id' => $artist->id,
            'category_id' => 2,
            'listener_count' => 41874,
        ]);

        $artist = Artist::where('name', 'Miyagi')->first();

        Song::create([
            'name' => 'Yamakasi',
            'audio_path' => 'storage/songs/miyagi/yamakasi.mp3',
            'artist_id' => $artist->id,
            'category_id' => 2,
            'listener_count' => 84175,
        ]);
    }
}
