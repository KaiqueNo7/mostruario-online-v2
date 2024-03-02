<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectCategory extends Component
{
    public $idCategory;

    public function filterCategoryById()
    {
        $this->dispatch('filterCategory', $this->idCategory);
    }

    public function render()
    {
        $categories = Category::where('id_user', Auth::user()->id)->orderby('name', 'asc')->get();

        return view('livewire.select-category', ['category' => $categories]);
    }
}
