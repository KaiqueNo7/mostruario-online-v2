<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalVariousProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ModalVariousProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalVariousProducts::class)
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_create_various_products()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $products = Product::count();  
        $this->assertEquals($products, Product::count());

        Livewire::test(ModalVariousProducts::class)
            ->set('name', 'Product')
            ->set('description', 'Something')
            ->set('id_category', '1')
            ->set('images', [
                UploadedFile::fake()->image('public/storage/',640,480, null, false),
                UploadedFile::fake()->image('public/storage/',640,480, null, false),
                UploadedFile::fake()->image('public/storage/',640,480, null, false),
            ])
            ->set('id_user', $user->id)
            ->call('store');

        $this->assertEquals($products + 3, Product::count());
    }
}
