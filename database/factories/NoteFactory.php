<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::ucfirst($this->faker->sentence(rand(1, 4))),
            'desc' => rand(0, 3) == 0 ? '' : $this->faker->text(50),
            'url' => rand(0, 1) == 0 ? '' : $this->faker->url(),
            'content' => rand(0, 3) == 0 ? '' : $this->faker->sentence(rand(4, 12)),
            'category_id' => rand(1, 5),
            'user_id' => rand(1, 5),
            'private' => !(rand(1, 5) == 1),
        ];
    }
}
