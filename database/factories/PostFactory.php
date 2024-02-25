<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
            'title' => fake()->text(30),
            "excerpt" => fake()->text(60),
            "body" => fake()->text(300),
            "published_at" => now(),
            "imgUrl" => randomPostImage(),
            "category_id" => Category::factory(),
            "user_id" => User::factory()
        ];
    }
}
