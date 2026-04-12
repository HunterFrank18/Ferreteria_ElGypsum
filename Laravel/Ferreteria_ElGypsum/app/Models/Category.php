<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    //Una categoria puede tener muchos productos
    //Relacion de uno a muchos (Product-Category)
    public function products(){
        return $this->hasMany(Product::class);
    }
}
