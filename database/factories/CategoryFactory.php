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
            'id_user' => User::factory(),
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->sentence,
            'image' => 'test_image.jpg',
            'presentation' => $this->faker->numberBetween(1, 10),
            'number_installments' => $this->faker->numberBetween(1, 12),
        ];
    }
}
