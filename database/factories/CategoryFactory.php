<?php

namespace Database\Factories;

use Exception;
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
     * @throws Exception
     */
    public function definition()
    {
        return [
            'name' => Str::ucfirst($this->faker->unique()->word()),
            'icon' => (random_int(0, 1) === 0) ? 'list.svg' : 'settings.svg',
         ];
    }
}
