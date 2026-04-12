<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Variantes</title>

</head>
<body class="site-font bg-ferreteria bg-cover bg-center">

<div class="container mt-5">
    <div class="admin-panel">
        <h1>Listado de Variantes</h1>

        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <ul>
            @forelse($variants ?? [] as $variant)
                <li>{{ $variant->name ?? 'Variante' }}</li>
            @empty
                <li>No hay variantes</li>
            @endforelse
        </ul>
    </div>
</div>

</body>
</html>
