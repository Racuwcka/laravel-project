<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'genre' => $this->faker->sentence(1),
            'director' => $this->faker->name(),
            'release' => $this->faker->date('Y'),
            'rating' => random_int(1, 10),
        ];
    }
}
