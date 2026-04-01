<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price_gold' => fake()->randomFloat(2, 2000, 3000),
            'price_gold_change' => fake()->randomFloat(2, -50, 50),
            'price_silver' => fake()->randomFloat(2, 20, 30),
            'price_silver_change' => fake()->randomFloat(2, -5, 5),
            'created_at' => now(),
        ];
    }
}
