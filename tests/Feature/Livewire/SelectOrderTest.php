<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SelectOrder;
use Livewire\Livewire;
use Tests\TestCase;

class SelectOrderTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(SelectOrder::class)
            ->assertOk();
    }
}
