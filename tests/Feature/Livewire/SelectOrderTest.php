<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SelectOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SelectOrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SelectOrder::class)
            ->assertStatus(200);
    }
}
