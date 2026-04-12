<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\User;
use App\Models\VentaDetalle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
   public function user()
{
    return $this->belongsTo(User::class);
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
