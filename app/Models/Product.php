<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'category',
        'id_user',
        'name',
        'description',
        'price',
        'weight',
        'type',
        'image',
    ];
}
