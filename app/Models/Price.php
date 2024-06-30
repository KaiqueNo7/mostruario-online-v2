<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'price_gold',
        'price_gold_change',
        'price_silver',
        'price_silver_change',
        'created_at',
    ];
}
