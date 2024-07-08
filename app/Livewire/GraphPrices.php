<?php

namespace App\Livewire;

use App\Models\Price;
use Livewire\Component;

class GraphPrices extends Component
{
    public function render()
    {
        $prices = Price::all();

        return view('livewire.graph-prices', compact('prices'));
    }
}
