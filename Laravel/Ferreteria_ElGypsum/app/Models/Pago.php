<?php

namespace App\Models;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'monto',
        'metodo',
        'fecha_pago'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
