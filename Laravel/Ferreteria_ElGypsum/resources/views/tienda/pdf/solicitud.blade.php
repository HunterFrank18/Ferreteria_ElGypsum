<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ strtoupper($solicitud->tipo) }} {{ $solicitud->codigo }}</title>

    <style>
        body {
            margin: 0;
            color: #1f2933;
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            padding: 24px 30px;
            color: #fff;
            background: #111827;
            border-bottom: 6px solid #f6b400;
        }

        .brand {
            font-size: 27px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .muted {
            color: #6b7280;
        }

        .header .muted {
            color: #d1d5db;
        }

        .type {
            color: #f6b400;
            font-size: 22px;
            font-weight: 900;
            text-align: right;
        }

        .wrap {
            padding: 26px 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .head-table td {
            vertical-align: top;
        }

        .info td {
            width: 50%;
            padding: 12px 14px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }

        .label {
            display: block;
            margin-bottom: 4px;
            color: #6b7280;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            color: #111827;
            background: #f6b400;
            border-radius: 4px;
            font-weight: 800;
        }

        .expired {
            color: #991b1b;
            background: #fee2e2;
        }

        .products {
            margin-top: 20px;
        }

        .products th {
            padding: 10px;
            background: #f6b400;
            border: 1px solid #d99c00;
            text-transform: uppercase;
        }

        .products td {
            padding: 10px;
            border: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .summary {
            width: 300px;
            margin-top: 20px;
            margin-left: auto;
        }

        .summary td {
            padding: 11px 13px;
            border: 1px solid #e5e7eb;
        }

        .summary .total td {
            background: #f6b400;
            color: #111827;
            font-size: 15px;
            font-weight: 900;
        }

        .note {
            margin-top: 22px;
            padding: 14px;
            background: #f8fafc;
            border-left: 5px solid #f6b400;
            line-height: 1.55;
        }

        .validity-warning {
            margin-top: 18px;
            padding: 12px 14px;
            color: #92400e;
            background: #fffbeb;
            border: 1px solid #fcd34d;
            line-height: 1.5;
        }

        .validity-expired {
            color: #991b1b;
            background: #fee2e2;
            border-color: #fecaca;
        }

        .footer {
            margin-top: 24px;
            padding-top: 14px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <div class="header">
        <table class="head-table">
            <tr>
                <td>
                    <div class="brand">Ferreteria El Gypsum</div>
                    <div class="muted">Materiales de construccion, herramientas y mantenimiento</div>
                    <div class="muted">WhatsApp: 505865023595</div>
                </td>

                <td class="type">
                    {{ $solicitud->tipo === 'apartado' ? 'APARTADO' : 'PROFORMA' }}<br>
                    <span style="font-size:12px;color:#d1d5db;">
                        {{ $solicitud->codigo }}
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div class="wrap">
        <table class="info">
            <tr>
                <td>
                    <span class="label">Cliente</span>
                    <strong>{{ $solicitud->cliente_nombre }}</strong>
                </td>

                <td>
                    <span class="label">Telefono / WhatsApp</span>
                    <strong>{{ $solicitud->cliente_telefono }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="label">Correo</span>
                    <strong>{{ $solicitud->cliente_correo ?: 'No indicado' }}</strong>
                </td>

                <td>
                    <span class="label">Fecha</span>
                    <strong>{{ $solicitud->created_at->format('d/m/Y H:i') }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="label">Validez</span>
                    <strong>
                        @if($solicitud->expires_at)
                            Valida hasta {{ $solicitud->expires_at->format('d/m/Y H:i') }}
                        @else
                            Sin fecha de vencimiento
                        @endif
                    </strong>
                </td>

                <td>
                    <span class="label">Estado</span>

                    <span class="status {{ $solicitud->is_expired ? 'expired' : '' }}">
                        {{ $solicitud->estado_label }}
                    </span>
                </td>
            </tr>
        </table>

        @if($solicitud->expires_at)
            <div class="validity-warning {{ $solicitud->is_expired ? 'validity-expired' : '' }}">
                @if($solicitud->is_expired)
                    Esta {{ $solicitud->tipo === 'apartado' ? 'solicitud de apartado' : 'proforma' }} ya se encuentra vencida.
                @else
                    Esta {{ $solicitud->tipo === 'apartado' ? 'solicitud de apartado' : 'proforma' }}
                    es valida hasta el {{ $solicitud->expires_at->format('d/m/Y H:i') }}.
                    Precios, existencias y apartados estan sujetos a confirmacion del vendedor.
                @endif
            </div>
        @endif

        <table class="products">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach($solicitud->detalles as $detalle)
                    <tr>
                        <td class="center">{{ $loop->iteration }}</td>

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

                        <td class="center">{{ $detalle->quantity }}</td>

                        <td class="right">
                            C$ {{ number_format((float) $detalle->price, 2) }}
                        </td>

                        <td class="right">
                            C$ {{ number_format((float) $detalle->subtotal, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="summary">
            <tr>
                <td>Subtotal</td>
                <td class="right">
                    C$ {{ number_format((float) $solicitud->total, 2) }}
                </td>
            </tr>

            <tr>
                <td>Impuestos</td>
                <td class="right">Incluidos / por confirmar</td>
            </tr>

            <tr class="total">
                <td>Total</td>
                <td class="right">
                    C$ {{ number_format((float) $solicitud->total, 2) }}
                </td>
            </tr>
        </table>

        @if($solicitud->nota)
            <div class="note">
                <strong>Nota:</strong> {{ $solicitud->nota }}
            </div>
        @else
            <div class="note">
                Esta solicitud es una referencia. Precios, existencias y apartados estan sujetos a confirmacion del vendedor.
            </div>
        @endif

        <div class="footer">
            Gracias por cotizar con Ferreteria El Gypsum.
        </div>
    </div>
</body>
</html>
