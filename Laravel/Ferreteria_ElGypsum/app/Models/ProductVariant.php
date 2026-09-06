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
        'presentation',
        'color',
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

    protected static function boot()
{
    parent::boot();

    static::creating(function ($variant) {

        $productName = $variant->product->name ?? 'PROD';
        $brandName = $variant->brand->name ?? 'BRAND';

        // limpiar y separar palabras
        $productWords = explode(' ', strtoupper($productName));
        $brandWords = explode(' ', strtoupper($brandName));

        // tomar primeras letras
        $prodPart = substr($productWords[0] ?? 'PR', 0, 2);
        $prodPart2 = isset($productWords[1]) ? substr($productWords[1], 0, 3) : '';

        $brandPart = substr($brandWords[0] ?? 'BR', 0, 3);

        // contador
        $count = ProductVariant::where('product_id', $variant->product_id)
            ->where('brand_id', $variant->brand_id)
            ->count() + 1;

        $correlativo = str_pad($count, 3, '0', STR_PAD_LEFT);

        // SKU final
        $variant->sku = $prodPart . '-' . $prodPart2 . '-' . $brandPart . '-' . $correlativo;

    });
}

public function getFullNameAttribute()
{
    $presentation = $this->presentation ? ' - ' . $this->presentation : '';
    $color = $this->color ? ' - ' . $this->color : '';

    return ($this->product->name ?? '') . ' - ' . ($this->brand->name ?? '') . $presentation . $color;
}

}
