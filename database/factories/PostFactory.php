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
            'title' => $this->faker->sentence(),
            'text' => $this->faker->randomHtml(),
            'level' => $this->faker->numberBetween(1, 5),
            'view_count' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 10),
            'slug' => $this->faker->slug(),
            'is_published' => $this->faker->boolean(),
        ];
    }
}
