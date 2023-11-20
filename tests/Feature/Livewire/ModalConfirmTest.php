<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalConfirm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalConfirmTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalConfirm::class)
            ->assertStatus(200);
    }
}
