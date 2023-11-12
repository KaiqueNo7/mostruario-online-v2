<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalProductTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalProduct::class)
            ->assertStatus(200);
    }
}
