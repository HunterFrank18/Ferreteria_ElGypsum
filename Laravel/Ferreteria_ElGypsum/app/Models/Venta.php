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


// 💰 Total pagado
public function getTotalPagadoAttribute()
{
    return $this->pagos()->sum('monto');
}

// 📉 Saldo pendiente
public function getSaldoAttribute()
{
    return max($this->total - $this->total_pagado, 0);
}

// ⏰ Días en mora
public function getDiasMoraAttribute()
{
    if(!$this->fecha_limite_pago) return 0;

    if(now()->lessThanOrEqualTo($this->fecha_limite_pago)){
        return 0;
    }

    return now()->diffInDays($this->fecha_limite_pago);
}

//Reporte diario
public function reporteDiario()
{
    $ventas = Venta::whereDate('created_at', today())->get();

    return view('admin.reportes.diario', compact('ventas'));
}

}
