<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'artist' => $this->faker->paragraph(2),
            'cover_image' => $this->faker->imageUrl(640, 480, 'music'),
        ];
    }
}
