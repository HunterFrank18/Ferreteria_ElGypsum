<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;



class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'brand_id',
        'price',
        'stock',
        'sku'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
