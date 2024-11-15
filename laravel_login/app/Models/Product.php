<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProductRequest;


class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category',
        'name',
        'description',
        'picture',
        'price',
        'stock'
    ];
}
