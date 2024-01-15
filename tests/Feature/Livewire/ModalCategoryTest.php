<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ModalCategory;
use App\Livewire\ModalConfirm;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ModalCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

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
            ->set('description', 'Something')
            ->set('presentation', '1')
            ->set('number_installments', '5')
            ->set('image', UploadedFile::fake()->create('test_image.jpg'))
            ->set('id_user', $user->id)
            ->call('store');

        $this->assertDatabaseHas('categories', [
            'name' => 'Name category',
            'description' => 'Something',
            'presentation' => '1',
            'number_installments' => '5',
            'id_user' => $user->id,
        ]);
    }

    /** @test */
    public function user_can_update_category()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        Livewire::test(ModalCategory::class)
            ->set('name', 'Name category example')
            ->set('description', 'Something example')
            ->set('presentation', '1')
            ->set('image', UploadedFile::fake()->create('test_image_category.jpg'))
            ->call('update', id: $category->id);

        $this->assertDatabaseHas('categories', [
            'name' => 'Name category example',
            'description' => 'Something example',
            'presentation' => '1',
            'id' => $category->id,
        ]);
    }

    /** @test */
    public function user_can_delete_category()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        Livewire::test(ModalConfirm::class)
        ->call('destroyCategory', id: $category->id);
        
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }
}
