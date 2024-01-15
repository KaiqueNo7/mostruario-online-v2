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

    public $open_modal = false;
    public $search;
    public $id_category;
    public $order_by = 'desc';
    public $message = "Você tem certeza que deseja excluir o produto?";
    public int $per_page = 8;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.skeleton', $params);
    }

    public function edit($id)
    {
        $this->dispatch('openModalProduct', true)->to(ModalProduct::class);
        $this->dispatch('editProduct', id: $id)->to(ModalProduct::class);
    }

    public function confirm($id)
    {
        $this->dispatch('openModalConfirm', $id, $this->message, 'destroyProduct');
    }

    #[On('filterCategory')] 
    public function filterCategory($value)
    {
        $this->id_category = $value;
    }

    #[On('orderByCategory')] 
    public function orderByCategory($order_by)
    {
        $this->order_by = $order_by;
    }

    public function render()
    {
        $id = Auth::user()->id;

        $products = Product::where('id_user', $id)
        ->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
         })
         
         ->when($this->id_category, function ($query, $id_category) {
            return $query->where('id_category', $id_category);
         })->orderBy('created_at', $this->order_by)->paginate(
            $this->per_page
         );

         $total_products = Product::where('id_user', $id)->get();

         $count = $total_products->count();

        return view('livewire.card-product', ['products' => $products, 'count' => $count]);
    }

    public function loadMore(): void 
    {
        $this->per_page += 8;
    }
}
