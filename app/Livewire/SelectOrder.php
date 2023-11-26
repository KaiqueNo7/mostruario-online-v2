<?php

namespace App\Livewire;

use Livewire\Component;

class SelectOrder extends Component
{
    public $orderBy;

    public function OrderByCategory()
    {
        $this->dispatch('OrderByCategory', $this->orderBy);
    }

    public function render()
    {
        return view('livewire.select-order');
    }
}
