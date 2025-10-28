<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artistId = Artist::inRandomOrder()->first()->id;
        $categoryId = Category::inRandomOrder()->first()->id;
        $listenerCount = fake()->numberBetween(0, 1000);
        
        return [
            'name'=> fake()->name(),
            'artist_id'=> $artistId,
            'category_id'=> $categoryId,
            'listener_count'=> $listenerCount,
        ];
    }
}
