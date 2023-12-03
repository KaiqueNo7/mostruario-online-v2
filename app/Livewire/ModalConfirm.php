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

    #[On('openModalConfirm')]
    public function openModalConfirm($id)
    {
        $this->openModalConfirm = true;
        $this->idCategory = $id;
    }
    
    public function closeModal()
    {
        $this->openModalConfirm = false;
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
        Product::where('category', $id)->delete();
        
        return redirect()->route('view.category')->with('success', 'Categoria deletada com sucesso');   
    }

    public function render()
    {
        return view('livewire.modal-confirm');
    }
}
