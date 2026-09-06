<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorteCaja extends Model
{

protected $table = 'cortes_caja';

     protected $fillable = [
        'user_id','monto_inicial','total_ventas',
        'total_efectivo','total_transferencia','total_tarjeta',
        'total_credito','total_abonos','total_egresos',
        'saldo_final','apertura','cierre'
    ];
}
