<?php

namespace App\Livewire;

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
    }

    public function showModalVariousProducts()
    {
        $this->dispatch('openModalVariousProducts', true)->to(ModalVariousProducts::class);
    }

    public function showModalCategory()
    {
        $this->openModal = true;
        $this->dispatch('openModalCategory', $this->openModal)->to(ModalCategory::class);
    }

    public function render()
    {
        return view('livewire.button-principal');
    }
}
