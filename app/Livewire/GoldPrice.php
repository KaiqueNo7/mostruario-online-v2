<?php

namespace App\Livewire;

use App\Models\Price;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class GoldPrice extends Component
{
    public $goldPrice;
    public $goldPricePerGram;
    public $priceChange;
    public $dollarRate;

    public function render()
    {
        $goldPrice = Price::latest('updated_at')->first();
        
        return view('livewire.gold-price', ['data' => $goldPrice]);
    }
}
