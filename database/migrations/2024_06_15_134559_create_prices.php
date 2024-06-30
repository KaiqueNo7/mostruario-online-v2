<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price_gold', total: 8, places: 2);
            $table->decimal('price_gold_change', total: 8, places: 2);
            $table->decimal('price_silver', total: 8, places: 2);
            $table->decimal('price_silver_change', total: 8, places: 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
