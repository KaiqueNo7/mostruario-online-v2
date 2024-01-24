<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalVariousProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ModalVariousProductsTest extends TestCase
{
    use RefreshDatabase;

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

        $this->assertEquals(0, Product::count());

        Livewire::test(ModalVariousProducts::class)
            ->set('name', 'Product')
            ->set('description', 'Something')
            ->set('id_category', '1')
            ->set('images', [
                UploadedFile::fake()->create('test_image1.jpg'),
                UploadedFile::fake()->create('test_image2.jpg'),
                UploadedFile::fake()->create('test_image3.jpg'),
            ])
            ->set('id_user', $user->id)
            ->call('store');

        $this->assertEquals(3, Product::count());
    }
}
