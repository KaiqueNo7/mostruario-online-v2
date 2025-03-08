<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ApresentationProducts;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ApresentationProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        $user = User::factory()->create();

        $name_user = strtolower(str_replace(' ', '-', $user->name));

        $this->get('mo/'.$name_user)->assertOk();
    }

    public function test_component_exists_on_the_page()
    {
        $user = User::factory()->create();
        Category::factory()->count(2)->create();
        Product::factory()->count(5)->create();

        $name_user = strtolower(str_replace(' ', '-', $user->name));

        $this->get('mo/'.$name_user)
            ->assertSeeLivewire(ApresentationProducts::class);
    }

    public function test_display_all_products_with_showcase()
    {
        $user = User::factory()->create();
        $categories = Category::factory()->count(2)->create();
        $products = Product::factory()->count(5)->create();

        $name_user = strtolower(str_replace(' ', '-', $user->name));

        $response = $this->get('mo/'.$name_user);

        $response->assertOk();
        $response->assertViewIs('showcase');

        Livewire::test(ApresentationProducts::class, ['id' => $user->id])
            ->assertViewHas('products', function ($productsInView) use ($products) {
                return $productsInView->count() === $products->count();
            })
            ->assertViewHas('categories', function ($categoriesInView) use ($categories) {
                return $categoriesInView->count() === $categories->count();
            });
    }
}
