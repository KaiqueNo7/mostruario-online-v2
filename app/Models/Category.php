<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'name',
        'description',
        'image',
        'presentation',
        'number_installments',
    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id', 'property_id');
    }
}
