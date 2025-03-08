<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CardCategory;
use App\Livewire\ModalCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/categories');

        $response->assertViewIs('layouts.categories');

        $response->assertOk();
    }

    public function test_user_can_create_category()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(ModalCategory::class)
            ->set('name', 'Name category')
            ->call('store');

        $this->assertDatabaseHas('categories', [
            'name' => 'Name category',
        ]);
    }

    public function test_user_can_update_category()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $category = Category::factory()->create();

        Livewire::test(ModalCategory::class)
            ->set('name', 'Name category example')
            ->call('update', id: $category->id);

        $this->assertDatabaseHas('categories', [
            'name' => 'Name category example',
            'id' => $category->id,
        ]);
    }

    public function test_user_can_delete_category()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $category = Category::factory()->create();

        Livewire::test(CardCategory::class)
            ->call('delete', id: $category->id);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }
}
