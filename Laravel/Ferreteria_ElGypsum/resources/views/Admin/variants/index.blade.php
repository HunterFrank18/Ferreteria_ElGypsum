@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Variantes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3 gap-2 flex-column flex-md-row">

        <div class="d-flex gap-2">
            <a href="{{ route('admin.variants.create') }}" class="btn btn-primary">Crear Variante</a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Volver a Productos</a>
        </div>

        <form class="d-flex gap-2" method="GET">
            <select name="product_id" class="form-control">
                <option value="">Todas las variantes</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" @selected(request('product_id') == $product->id)>{{ $product->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary">Filtrar</button>
        </form>

    </div>

    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Marca</th>
                        <th>Presentacion</th>
                        <th>Color</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($variants as $variant)
                        <tr>
                            <td>{{ $variant->product->name }}</td>
                            <td>{{ $variant->brand->name }}</td>
                            <td>{{ $variant->presentation ?? 'N/A' }}</td>
                            <td>{{ $variant->color ?? 'N/A' }}</td>
                            <td>C$ {{ number_format($variant->price, 2) }}</td>
                            <td>{{ $variant->stock }}</td>
                            <td>
                                <a href="{{ route('admin.variants.edit', $variant->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay variantes</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $variants->links() }}
    </div>

</div>

@endsection
