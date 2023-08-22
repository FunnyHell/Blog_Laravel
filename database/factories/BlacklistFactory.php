<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blacklist>
 */
class BlacklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'receiver_id' => $this->faker->numberBetween(1, 10),
            'is_forever' => $this->faker->boolean(),
            'expired_at' => $this->faker->optional($weight = 0.5, $default = null)->dateTimeBetween('-1 year', '+1 year'),
        ];

    }
}
