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
            'price_gold' => fake()->randomNumber(2, false),
            'price_gold_change' => fake()->randomNumber(2, false),
            'price_silver' => fake()->randomNumber(2, false),
            'price_silver_change' => fake()->randomNumber(2, false),
            'created_at' => fake()->dateTimeThisMonth(),
        ];
    }
}
