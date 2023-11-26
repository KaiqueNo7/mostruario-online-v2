<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ApresetaionProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ApresetaionProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ApresetaionProducts::class)
            ->assertStatus(200);
    }
}
