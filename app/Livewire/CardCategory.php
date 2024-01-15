<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardCategory extends Component
{

    public $open_modal = false;
    public $search = '';
    public $message = "Você tem certeza que deseja excluir a categoria?";
    public $destroy = "destroyCategory";

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.skeleton', $params);
    }
    
    public function edit($id)
    {
        $this->dispatch('openModalCategory', true);
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
