<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CardProduct extends Component
{
    use WithPagination;

    public $openModal = false;
    public $search;
    public $idCategory;
    public $orderBy = 'desc';
    public $seeMoreCount = false;
    public $message = "Você tem certeza que deseja excluir o produto?";
    public $destroy = "destroyProduct";

    public function edit($id)
    {
        $this->openModal = true;
        $this->dispatch('openModalProduct', $this->openModal)->to(ModalProduct::class);
        $this->dispatch('editProduct', id: $id)->to(ModalProduct::class);
    }

    public function confirm($id)
    {
        $this->dispatch('openModalConfirm', $id, $this->message, $this->destroy);
    }

    #[On('filterCategory')] 
    public function filterCategory($value)
    {
        $this->idCategory = $value;
    }

    #[On('OrderByCategory')] 
    public function OrderByCategory($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        $id = Auth::user()->id;

        $products = Product::where('id_user', $id)
        ->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
         })
         
         ->when($this->idCategory, function ($query, $idCategory) {
            return $query->where('category', $idCategory);
         })->orderBy('created_at', $this->orderBy)->get();

         $count = $products->count();

        return view('livewire.card-product', ['products' => $products, 'count' => $count]);
    }
}
