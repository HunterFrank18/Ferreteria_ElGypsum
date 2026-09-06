<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'codigo',
        'tipo',
        'estado',
        'cliente_nombre',
        'cliente_telefono',
        'cliente_correo',
        'nota',
        'total',
        'pdf_path',
        'whatsapp_url',
        'notified_at',
        'expires_at',
        'approved_at',
        'closed_at',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'notified_at' => 'datetime',
        'expires_at' => 'datetime',
        'approved_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function detalles()
    {
        return $this->hasMany(SolicitudDetalle::class);
    }

    public function getIsExpiredAttribute(): bool
    {
        return $this->expires_at
            && now()->greaterThan($this->expires_at)
            && ! in_array($this->estado, ['aprobada', 'cerrada', 'rechazada']);
    }

    public function getEstadoLabelAttribute(): string
    {
        if ($this->is_expired && $this->estado !== 'vencida') {
            return 'Vencida';
        }

        return [
            'nueva' => 'Nueva',
            'en_revision' => 'En revision',
            'contactado' => 'Contactado',
            'aprobada' => 'Aprobada',
            'rechazada' => 'Rechazada',
            'cerrada' => 'Cerrada',
            'vencida' => 'Vencida',
        ][$this->estado] ?? ucfirst($this->estado);
    }

    public function getEstadoBadgeAttribute(): string
    {
        if ($this->is_expired || $this->estado === 'vencida') {
            return 'bg-danger';
        }

        return [
            'nueva' => 'bg-primary',
            'en_revision' => 'bg-warning text-dark',
            'contactado' => 'bg-info text-dark',
            'aprobada' => 'bg-success',
            'rechazada' => 'bg-secondary',
            'cerrada' => 'bg-dark',
        ][$this->estado] ?? 'bg-secondary';
    }
}
