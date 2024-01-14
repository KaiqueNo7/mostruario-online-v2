<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CardCategory extends Component
{
    use WithPagination;

    public $openModal = false;
    public $search = '';
    public $message = "Você tem certeza que deseja excluir a categoria?";
    public $destroy = "destroyCategory";
    
    public function edit($id)
    {
        $this->openModal = true;
        $this->dispatch('openModalCategory', $this->openModal);
        $this->dispatch('mount', id: $id);
    }
    
    public function confirm($id)
    {
        $this->dispatch('openModalConfirm', $id, $this->message, $this->destroy);
    }

    public function render()
    {
        $id = Auth::user()->id;

        $categories = Category::where('id_user', $id)->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('name', 'asc')->get();

        $count = $categories->count();

        return view('livewire.card-category', ['categories' => $categories, 'count' => $count]);
    }
}
