@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h3 class="mb-1">{{ $solicitud->codigo }}</h3>
        <p class="text-muted mb-0">
            {{ ucfirst($solicitud->tipo) }} creada el {{ $solicitud->created_at->format('d/m/Y H:i') }}
        </p>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.solicitudes.index') }}" class="btn btn-outline-dark">Volver</a>

        @if($solicitud->pdf_path)
            <a href="{{ route('solicitudes.pdf', $solicitud->codigo) }}" class="btn btn-danger">
                Descargar PDF
            </a>
        @endif

        @if($solicitud->whatsapp_url)
            <a href="{{ $solicitud->whatsapp_url }}" target="_blank" class="btn btn-success">
                Enviar WhatsApp
            </a>
        @endif
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($solicitud->is_expired)
    <div class="alert alert-danger">
        Esta solicitud ya esta vencida.
    </div>
@endif

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white">
                Detalle de productos
            </div>

            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cant.</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($solicitud->detalles as $detalle)
                            <tr>
                                <td>
                                    <strong>{{ $detalle->product_name }}</strong>

                                    @if($detalle->brand_name)
                                        <br><small>Marca: {{ $detalle->brand_name }}</small>
                                    @endif

                                    @if($detalle->presentation)
                                        <br><small>Presentacion/medida: {{ $detalle->presentation }}</small>
                                    @endif

                                    @if($detalle->color)
                                        <br><small>Color: {{ $detalle->color }}</small>
                                    @endif

                                    @if($detalle->sku)
                                        <br><small>SKU: {{ $detalle->sku }}</small>
                                    @endif
                                </td>

                                <td>{{ $detalle->quantity }}</td>

                                <td>
                                    C$ {{ number_format((float) $detalle->price, 2) }}
                                </td>

                                <td>
                                    C$ {{ number_format((float) $detalle->subtotal, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total</th>
                            <th>C$ {{ number_format((float) $solicitud->total, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-dark text-white">
                Cliente
            </div>

            <div class="card-body">
                <p class="mb-2">
                    <strong>Nombre:</strong> {{ $solicitud->cliente_nombre }}
                </p>

                <p class="mb-2">
                    <strong>Telefono:</strong> {{ $solicitud->cliente_telefono }}
                </p>

                <p class="mb-2">
                    <strong>Correo:</strong> {{ $solicitud->cliente_correo ?: 'No indicado' }}
                </p>

                <p class="mb-2">
                    <strong>Estado:</strong>
                    <span class="badge {{ $solicitud->estado_badge }}">
                        {{ $solicitud->estado_label }}
                    </span>
                </p>

                <p class="mb-2">
                    <strong>Vence:</strong>
                    {{ $solicitud->expires_at ? $solicitud->expires_at->format('d/m/Y H:i') : 'Sin vencimiento' }}
                </p>

                @if($solicitud->approved_at)
                    <p class="mb-2">
                        <strong>Aprobada:</strong> {{ $solicitud->approved_at->format('d/m/Y H:i') }}
                    </p>
                @endif

                @if($solicitud->closed_at)
                    <p class="mb-0">
                        <strong>Cerrada:</strong> {{ $solicitud->closed_at->format('d/m/Y H:i') }}
                    </p>
                @endif
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white">
                Seguimiento
            </div>

            <div class="card-body">
                <form action="{{ route('admin.solicitudes.update', $solicitud) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Estado</label>

                        <select name="estado" class="form-select">
                            @foreach([
                                'nueva' => 'Nueva',
                                'en_revision' => 'En revision',
                                'contactado' => 'Contactado',
                                'aprobada' => 'Aprobada',
                                'rechazada' => 'Rechazada',
                                'cerrada' => 'Cerrada',
                                'vencida' => 'Vencida'
                            ] as $value => $label)
                                <option value="{{ $value }}" @selected($solicitud->estado === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nota interna</label>

                        <textarea name="nota" class="form-control" rows="4">{{ old('nota', $solicitud->nota) }}</textarea>
                    </div>

                    <button class="btn btn-primary w-100">
                        Guardar seguimiento
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
