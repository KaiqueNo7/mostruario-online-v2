<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalConfirm extends Component
{
    public $openModalConfirm;
    public $idCategory;
    public $idProduct;
    public $message;
    public $destroy;

    #[On('openModalConfirm')]
    public function openModalConfirm($id, $message, $destroy)
    {
        $this->message = $message;
        $this->destroy = $destroy;        
        $this->openModalConfirm = true;
        $this->idCategory = $id;
    }
    
    public function closeModal()
    {
        $this->openModalConfirm = false;
    }

    public function destroyCategory($id){
        Category::where('id', $id)->delete();
        Product::where('category', $id)->delete();
        
        return redirect()->route('view.category')->with('success', 'Categoria deletada com sucesso');   
    }

    public function destroyProduct($id){
        Product::where('id', $id)->delete();
        
        session()->flash('success', 'Produto deletado com sucesso!');

        return redirect()->route('view.products');
    }

    public function render()
    {
        return view('livewire.modal-confirm');
    }
}
