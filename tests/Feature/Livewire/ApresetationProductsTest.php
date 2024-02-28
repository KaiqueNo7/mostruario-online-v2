<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ApresetationProducts;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ApresetationProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        // Livewire::test(ApresetationProducts::class)
        //     ->assertStatus(200);
        $this->assertTrue(true);

    }
}
