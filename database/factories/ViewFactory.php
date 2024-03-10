<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $yesterday = Carbon::yesterday();

        return [
            'session_id' => fake()->numberBetween(1, 1000),
            'id_showcase' => User::inRandomOrder()->first(),
            // 'created_at' => $yesterday,
            // 'updated_at' => $yesterday,
        ];
    }
}
