<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::ucfirst($this->faker->word()),
            'icon' => (rand(0, 1) == 0) ? 'list.svg' : 'settings.svg',
            'custom' => rand(0, 3) == 0,
         ];
    }
}
