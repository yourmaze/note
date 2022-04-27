<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entity>
 */
class EntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        $text = '';
        if(!random_int(0, 3)) {
            $text = implode($this->faker->paragraphs(random_int(4, 12)));
        }

        return [
            'id' => $this->faker->uuid(),
            'title' => Str::ucfirst($this->faker->sentence(random_int(1, 8))),
            'desc' => random_int(0, 3) === 0 ? '' : $this->faker->text(50),
            'type' => 1,
            'url' => random_int(0, 1) === 0 ? '' : $this->faker->url(),
            'img' => random_int(0, 3) === 0 ? '' : $this->faker->word(),
            'category_id' => random_int(1, 20),
            'body_text' => $text,
            'body' => strip_tags($text),
            'private' => !(random_int(1, 5) === 1),
        ];
    }
}
