<?php

namespace App\Models;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Cliente extends Model
{

    public function ventas()
{
    return $this->hasMany(Venta::class);
}

protected $fillable = [
    'nombre',
    'telefono',
    'direccion',
    'limite_credito',
    'estado'
];

}
