<?php

namespace App\Jobs;

use App\Models\Price;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetPrices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $goldPrice;
    public $goldPricePerGram;
    public $goldPriceChange;

    public $silverPrice;
    public $silverPerGram;
    public $silverPriceChange;

    public $dollarRate;
    
    public function __construct()
    {
        //
    }

    public function handle(): void
    {
        $apiKey = env('GOLD_API_KEY');

        $response_gold = Http::withHeaders([
            'x-access-token' => $apiKey,
        ])->get('https://www.goldapi.io/api/XAU/USD');

        $response_silver = Http::withHeaders([
            'x-access-token' => $apiKey,
        ])->get('https://www.goldapi.io/api/XAG/USD');

        $this->dollarRate = $this->fetchDollarRate();

        $this->silverPrice = 0;
        $this->silverPerGram = 0;
        $this->silverPriceChange = 0;

        $this->goldPrice = 0;
        $this->goldPricePerGram = 0;
        $this->goldPriceChange = 0;

        if ($response_silver->successful()) {
            $dataSilver = $response_silver->json();

            $this->silverPrice = $dataSilver['price'];
            $this->silverPerGram = $this->convertOunceToGram($this->silverPrice, $this->dollarRate);
            $this->silverPriceChange = $dataSilver['chp'];
        }

        if ($response_gold->successful()) {
            $dataGold = $response_gold->json();

            $this->goldPrice = $dataGold['price'];
            $this->goldPricePerGram = $this->convertOunceToGram($this->goldPrice, $this->dollarRate);
            $this->goldPriceChange = $dataGold['chp'];
        }

        Price::create([
            'price_gold' => number_format($this->goldPricePerGram, 2),
            'price_gold_change' => $this->goldPriceChange,
            'price_silver' => number_format($this->silverPerGram, 2),
            'price_silver_change' => $this->silverPriceChange,
        ]);
    }

    private function fetchDollarRate(): float
    {
        $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');

        if ($response->successful()) {
            $data = $response->json();
            return $data['rates']['BRL'];
        } else {
            return 5.0;
        }
    }

    private function convertOunceToGram(float $pricePerOunce, float $realInDollar): float
    {
        $gramsPerOunce = 31.1035;
        return ($pricePerOunce / $gramsPerOunce) * $realInDollar;
    }
}
