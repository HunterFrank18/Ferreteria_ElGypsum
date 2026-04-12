<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\ProductVariant;
use App\Models\Venta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
      use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function venta()
{
    return $this->belongsTo(Venta::class);
}

public function productoVariante()
{
    return $this->belongsTo(ProductVariant::class);
}

public function cliente()
{
    return $this->belongsTo(Cliente::class);
}

public function detalles()
{
    return $this->hasMany(VentaDetalle::class);
}

public function pagos()
{
    return $this->hasMany(Pago::class);
}
}
