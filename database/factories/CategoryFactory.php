<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => 32, //User::factory(),
            'name' => fake()->unique()->name,
            'description' => fake()->paragraph,
            'presentation' => fake()->numberBetween(1, 10),
            'number_installments' => fake()->numberBetween(1, 12),
        ];
    }
}
