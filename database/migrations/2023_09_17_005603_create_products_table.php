<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category');
            $table->foreignId('id_user');
            $table->char('name', 100);
            $table->char('description', 255)->nullable();
            $table->decimal('price', $precision = 8, $scale = 2)->nullable();
            $table->decimal('weight', $precision, $scale)->nullable();
            $table->integer('type');
            $table->binary('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
