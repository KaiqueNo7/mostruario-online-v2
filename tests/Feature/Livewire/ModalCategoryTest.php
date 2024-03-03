<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CardCategory;
use App\Livewire\ModalCategory;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class ModalCategoryTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalCategory::class)
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_create_category()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(ModalCategory::class)
            ->set('name', 'Name category')
            ->set('id_user', $user->id)
            ->call('store');

        $this->assertDatabaseHas('categories', [
            'name' => 'Name category',
            'id_user' => $user->id,
        ]);
    }

    /** @test */
    public function user_can_update_category()
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

    /** @test */
    public function user_can_delete_category()
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
