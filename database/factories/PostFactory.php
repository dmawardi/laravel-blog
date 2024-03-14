<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'published_at' => now(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(),
            // Relationships
            'user_id' => User::factory(),
            'category_id' => Category::factory()
        ];
    }
}
