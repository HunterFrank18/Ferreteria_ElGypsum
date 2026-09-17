@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            <h4>Crear Variante</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.variants.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Producto</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Marca</label>
                        <select name="brand_id" class="form-control" required>
                            <option value="">Seleccione una marca</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Presentacion / Medida</label>
                        <input type="text" name="presentation" class="form-control" placeholder='Ej: 1/2", 3/4", Galon'>
                    </div>
                    <div class="col-md-4 mb-3">


                        <label class="form-label">Color</label>
                        <input type="text" name="color" class="form-control" placeholder="Ej: Rojo, Negro, Blanco">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" name="price" step="0.01" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.variants.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button class="btn btn-success">Guardar Variante</button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection
