<?php

namespace Database\Factories;

use App\Models\Category;
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
             'id_category' => Category::factory(),
             'id_user' => 32, //User::factory(),
             'name' => fake()->unique()->name,
             'description' => fake()->sentence,
             'price' => fake()->randomFloat(2, 10, 100),
             'weight' => fake()->randomFloat(2, 0.1, 5),
             'type' => fake()->numberBetween(1, 10),
             'image' => fake()->image('public/storage/',640,480, null, false),
         ];
     }
}
