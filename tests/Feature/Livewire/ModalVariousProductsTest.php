<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalVariousProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalVariousProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalVariousProducts::class)
            ->assertStatus(200);
    }
}
