<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    const TYPE_GOLD = 1;
    const TYPE_SILVER = 2;

    protected $fillable = [
        'id',
        'id_category',
        'id_user',
        'name',
        'description',
        'price',
        'weight',
        'type',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
