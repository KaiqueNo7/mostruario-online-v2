<?php

namespace App\Jobs;

use App\Models\GoldPrice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetPriceGold implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $goldPrice;
    public $goldPricePerGram;
    public $priceChange;
    public $dollarRate;
    

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $apiKey = env('GOLD_API_KEY');
        $response = Http::withHeaders([
            'x-access-token' => $apiKey,
        ])->get('https://www.goldapi.io/api/XAU/USD');

        $this->dollarRate = $this->fetchDollarRate();

        if ($response->successful()) {
            $data = $response->json();

            $this->goldPrice = $data['price'];
            $this->goldPricePerGram = $this->convertOunceToGram($this->goldPrice, $this->dollarRate);
            $this->priceChange = $data['chp'];

        } else {
            $this->goldPrice = 0;
            $this->goldPricePerGram = 0;
            $this->priceChange = 0;
        }

        GoldPrice::create([
            'price_gold' => number_format($this->goldPricePerGram, 2),
            'price_change' => $this->priceChange,
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
