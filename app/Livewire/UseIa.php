<?php

namespace App\Livewire;

use App\Models\Price;
use App\Models\Product;
use Livewire\Component;
use Gemini\Data\Content;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Auth;

class UseIa extends Component
{
    public $weight;
    public $type;
    public $price;
    public $textResponse = '';

    public function generatePriceIA(): void
    {
        $quote = Price::first();

        if($this->type == Product::TYPE_GOLD){
            $type = 'GOLD';
            $price = $quote->price_gold; 
        }

        if($this->type == Product::TYPE_SILVER){
            $type = 'SILVER';
            $price = $quote->price_silver; 
        }

        $chat = Gemini::chat()
                    ->startChat(history: [
                        Content::parse(part: 'Hello, please calculate the price of the jewelry using the following metrics presented'),
                        Content::parse(part: 'I would like to sell using a multiplier: ' . Auth::user()->multiplier . 'this the user configures'),
                        Content::parse(part: 'I would just like you, based on this information, to suggest a more solid and profitable price, being fair for me and my client.'),
                        Content::parse(part: 'Importantly, the price of the jewelry is in Real.'),
                        Content::parse(part: 'Dont just do the rough calculation, knowing the data, suggest something new based on the market and the information you have.'),
                        Content::parse(part: 'Before concluding with the price, add descriptive text about the price construction'),
                        Content::parse(part: 'Importantly, never suggest a lower price than the calculated price. But feel free to suggest higher prices.'),
                        Content::parse(part: 'Also tips on payment options. And what could I put in interest to maintain my profit from the sale.'),
                        Content::parse(part: 'You can now suggest the price of the installments in small installments of up to 3x'),
                        Content::parse(part: 'the Answer in Portuguese'),
                    ]);

        $response = $chat->sendMessage('weight:' . $this->weight . ', type: ' . $type . 'Current quote: ' . $price);

        $text = $response->text();

        $formattedText = str_replace("**", "<b>", $text, $count);
        if ($count % 2 == 0) {
            $formattedText = preg_replace('/<b>([^<]*)<b>/', '<b>$1</b>', $formattedText);
        }
        $this->textResponse = $formattedText;
    }

    public function render()
    {
        return view('livewire.use-ia');
    }
}
