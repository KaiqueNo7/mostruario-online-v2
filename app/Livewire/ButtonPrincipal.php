<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ButtonPrincipal extends Component
{
    public $rotateClass = '';
    public $more = false;
    public $opacity = 'opacity-0';
    public $scale = 'scale-0';
    public $openModal = false;

    public function moreOptions()
    {
        
        $this->rotateClass = !$this->rotateClass ? 'rotate-[225deg]' : '';

        $this->more = !$this->more;

        if($this->more == true){
            $this->opacity = 'opacity-100';
            $this->scale = 'scale-100';
        }

        if($this->more == false){
            $this->opacity = 'opacity-0';
            $this->scale = 'scale-0';
        }
    }

    public function showModalProduct()
    {
        $this->dispatch('openModalProduct', true)->to(ModalProduct::class);
        $this->moreOptions();
    }

    public function showModalVariousProducts()
    {
        $this->dispatch('openModalVariousProducts', true)->to(ModalVariousProducts::class);
        $this->moreOptions();
    }

    public function showModalCategory()
    {
        $this->dispatch('openModalCategory', true)->to(ModalCategory::class);
        $this->moreOptions();
    }

    public function render()
    {
        $id = Auth::user()->id;
        
        $categories = Category::where('id_user', $id)->count();

        return view('livewire.button-principal', ['categories' => $categories]);
    }
}
