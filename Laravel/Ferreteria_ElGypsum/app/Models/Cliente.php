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

// 💳 Deuda total del cliente
public function getDeudaAttribute()
{
    return $this->ventas->sum(function($venta){
        return $venta->saldo;
    });
}


public function pagos()
{
    return $this->hasManyThrough(
        \App\Models\Pago::class,
        \App\Models\Venta::class,
        'cliente_id', // FK en ventas
        'venta_id',   // FK en pagos
        'id',         // PK cliente
        'id'          // PK venta
    );
}

// Scope para clientes morosos (deuda real)
public function scopeMorosos($query)
{
    return $query->whereHas('ventas', function($q){
        $q->whereRaw('total > (
            SELECT COALESCE(SUM(monto),0)
            FROM pagos
            WHERE pagos.venta_id = ventas.id
        )');
    });
}

protected $fillable = [
    'nombre',
    'telefono',
    'direccion',
    'limite_credito',
    'estado'
];

}
