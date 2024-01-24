<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalConfirm;
use App\Livewire\ModalProduct;
use App\Models\Product;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ModalProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalProduct::class)
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_create_product()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalProduct::class)
            ->set('name', 'Name product')
            ->set('description', 'Something')
            ->set('id_category', '1')
            ->set('image', UploadedFile::fake()->create('test_image.jpg'))
            ->set('id_user', $user->id)
            ->call('store');

        $this->assertDatabaseHas('products', [
            'name' => 'Name product',
            'description' => 'Something',
            'category' => '1',
            'id_user' => $user->id,
        ]);
    }

    /** @test */
    public function user_can_update_product()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        Livewire::test(ModalProduct::class)
            ->set('name', 'Name product example')
            ->set('description', 'Something example')
            ->set('id_category', '2')
            ->set('image', UploadedFile::fake()->create('test_image2.jpg'))
            ->call('update', id: $product->id);

        $this->assertDatabaseHas('products', [
            'name' => 'Name product example',
            'description' => 'Something example',
            'category' => '2',
            'id' => $product->id,
        ]);
    }

    /** @test */
    public function user_can_delete_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        Livewire::test(ModalConfirm::class)
        ->call('destroyProduct', id: $product->id);
        
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
