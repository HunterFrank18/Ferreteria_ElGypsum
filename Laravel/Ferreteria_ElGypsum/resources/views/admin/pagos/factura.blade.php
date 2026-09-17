<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }

        .header {
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .info {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #f2f2f2;
        }

        td, th {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        .total {
            text-align: right;
            margin-top: 15px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1 style="font-size:2.2em; letter-spacing:2px; text-transform:uppercase; font-weight:bold;">FERRETERÍA EL GYPSUM</h1>
    <h3 style="margin-top:8px;">Factura #{{ $pago->venta->numero_factura }}</h3>
</div>

<div class="info">
    <p><strong>Cliente:</strong>
        {{ $pago->venta->cliente->nombre ?? 'Consumidor Final' }}
    </p>
    <p><strong>Fecha:</strong>
        {{ \Carbon\Carbon::parse($pago->fecha_pago ?? $pago->fecha ?? now())->format('d/m/Y H:i') }}
    </p>
</div>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cant</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
       @foreach($pago->venta->detalles as $d)
<tr>
    <td>
        @php
            $nombre = $d->product_name
                ?? optional(optional($d->productoVariante)->product)->name
                ?? 'Producto no disponible';

            $marca = $d->brand_name
                ?? optional(optional($d->productoVariante)->brand)->name;

            $presentacion = $d->presentation
                ?? optional($d->productoVariante)->presentation;

            $sku = $d->sku
                ?? optional($d->productoVariante)->sku;
        @endphp

        <strong>{{ $nombre }}</strong>

        @if($marca)
            <br><small>Marca: {{ $marca }}</small>
        @endif

        @if($presentacion)
            <br><small>Medida/Presentacion: {{ $presentacion }}</small>
        @endif

        @if($sku)
            <br><small>SKU: {{ $sku }}</small>
        @endif
    </td>

    <td>{{ $d->cantidad }}</td>
    <td>C$ {{ number_format($d->precio_unitario, 2) }}</td>
    <td>C$ {{ number_format($d->subtotal, 2) }}</td>
</tr>
@endforeach

    </tbody>
</table>

<div class="total">
    <h3>Total: C$ {{ number_format($pago->monto,2) }}</h3>
</div>

<div class="footer">
    <p><strong>Dirección:</strong> Managua, Nicaragua</p>
    <p><strong>Tel:</strong> 8888-8888 / 7777-7777</p>
    <p style="font-size:1.1em; margin-top:10px;">Gracias por su compra</p>
</div>

</body>
</html>
