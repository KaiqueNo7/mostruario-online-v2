<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
     protected $model = Product::class;

     public function definition()
     {
         return [
             'category' => $this->faker->numberBetween(1, 10),
             'id_user' => User::factory(),
             'name' => $this->faker->unique()->name,
             'description' => $this->faker->sentence,
             'price' => $this->faker->randomFloat(2, 10, 100),
             'weight' => $this->faker->randomFloat(2, 0.1, 5),
             'type' => $this->faker->numberBetween(1, 10),
             'image' => 'test_image.jpg',
         ];
     }
}
