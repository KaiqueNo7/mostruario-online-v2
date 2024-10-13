<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CardProduct;
use App\Livewire\ModalProduct;
use App\Livewire\ModalVariousProducts;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertViewIs('layouts.products');

        $response->assertOk();
    }

    public function test_user_can_create_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $image = UploadedFile::fake()->image('produto.jpg');

        Livewire::test(ModalVariousProducts::class)
            ->set('id_category', $category->id)
            ->set('images', [$image])
            ->set('weight', '0.8')
            ->set('type', 1)
            ->call('store');

        $this->assertDatabaseHas('products', [
            'id_category' => $category->id,
        ]);
    }

    public function test_user_can_update_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $product = Product::factory()->create();

        Price::factory()->create();

        Livewire::test(ModalProduct::class)
            ->set('weight', '0.8')
            ->set('type', 0)
            ->set('id_category', $category->id)
            ->call('update', id: $product->id);

        $this->assertDatabaseHas('products', [
            'weight' => '0.8',
            'id_category' => $category->id,
        ]);
    }

    public function test_user_can_delete_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Price::factory()->create();

        Category::factory()->create();
        $product = Product::factory()->create();

        Livewire::test(CardProduct::class)
        ->call('destroy', id: $product->id);
        
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
