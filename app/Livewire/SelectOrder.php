<?php

namespace App\Livewire;

use Livewire\Component;

class SelectOrder extends Component
{
    public $order_by;

    public function orderByCategory()
    {
        $this->dispatch('orderByCategory', $this->order_by);
    }

    public function render()
    {
        return view('livewire.select-order');
    }
}
