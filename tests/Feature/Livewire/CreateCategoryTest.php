<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalCategory::class)
            ->assertStatus(200);
    }

    function can_create_post()
    {
        $this->actingAs(User::factory()->create());
 
        Livewire::test(ModalCategory::class)
            ->set('name', 'testando 01')
            ->set('description', 'testando 02')
            ->set('title', 'foo')
            ->set('title', 'foo')
            ->call('create');
 
        $this->assertTrue(ModalCategory::whereTitle('foo')->exists());
    }
}
