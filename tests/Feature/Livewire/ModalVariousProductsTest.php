<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalVariousProducts;
use App\Models\User;
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
}
