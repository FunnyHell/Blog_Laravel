<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LevelAccess>
 */
class LevelAccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(1, 10),
            'access_to_posts_level' => $this->faker->numberBetween(1, 5),
            'access_to_chats_level' => $this->faker->numberBetween(1, 5),
            'comment_level' => $this->faker->boolean,
            'monthly_payment' => $this->faker->randomFloat(2, 1, 100),
            'yearly_payment' => $this->faker->randomFloat(2, 1, 1000)
        ];
    }
}
