<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalProduct;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class ModalProductTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalProduct::class)
            ->assertStatus(200);
    }

    public function user_can_create_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalProduct::class)
            ->set('name', 'Name product')
            ->set('description', 'Something')
            ->set('category', 'rings')
            ->set('image', 'teste.jpg')
            ->set('id_user', $user)
            ->call('store');

        $this->assertDatabaseHas('products', [
            'name' => 'Name product',
            'description' => 'Something',
            'category' => 'rings',
            'image' => 'teste.jpg',
            'user_id' => $user->id,
        ]);
    }
}
