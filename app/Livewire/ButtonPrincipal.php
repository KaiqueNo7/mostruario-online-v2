<?php

namespace App\Livewire;

use Livewire\Component;

class ButtonPrincipal extends Component
{
    public $rotateClass = '';
    public $more = false;
    public $openModal = false;

    public function moreOptions()
    {
        $this->rotateClass = !$this->rotateClass ? 'rotate-[225deg]' : '';
        $this->more = !$this->more;
    }

    public function showModalProduct()
    {
        $this->openModal = true;
        $this->dispatch('openModalProduct', $this->openModal)->to(ModalProduct::class);
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
