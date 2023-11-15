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
    public $seeMoreCount = false;

    public function edit($id)
    {
        $this->openModal = true;
        $this->dispatch('openModalProduct', $this->openModal)->to(ModalProduct::class);
        $this->dispatch('editProduct', id: $id)->to(ModalProduct::class);
    }

    public function destroy($id){
        Product::where('id', $id)->delete();
        
        session()->flash('success', 'Post successfully updated.');

        return redirect()->route('view.products');
    }

    #[On('filterCategory')] 
    public function filterCategory($value)
    {
        $this->idCategory = $value;
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
         })->simplePaginate(8);

         $count = $products->count();

         if($count > 8){
            $this->seeMoreCount = true;
        }

        return view('livewire.card-product', ['products' => $products]);
    }
}
