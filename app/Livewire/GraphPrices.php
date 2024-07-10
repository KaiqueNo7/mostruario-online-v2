<?php

namespace App\Livewire;

use App\Models\Price;
use Livewire\Component;

class GraphPrices extends Component
{
    public function render()
    {
        $prices =  Price::orderBy('created_at', 'asc')->take(10)->get();

        return view('livewire.graph-prices', compact('prices'));
    }
}
