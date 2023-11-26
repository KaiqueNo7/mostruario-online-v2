<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ApresetationProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ApresetationProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ApresetationProducts::class)
            ->assertStatus(200);
    }
}
