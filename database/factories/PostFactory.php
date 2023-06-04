<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(rand(10, 12)),
            'content' => fake()->realText(rand(100, 500)),
            'user_id' => rand(1, 11),
            'is_visible' => 1,
            'published_at' => fake()->date,
            'created_at' => fake()->date,
            'updated_at' => null,
            'deleted_at' => null,
            'category_id' => rand(1, 4)
        ];
    }
}
