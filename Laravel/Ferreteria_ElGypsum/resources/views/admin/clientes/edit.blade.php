@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
<h1>Editar Cliente</h1>
@stop

@section('content')

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('admin.clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <textarea name="direccion" class="form-control">{{ $cliente->direccion }}</textarea>
            </div>

            <div class="mb-3">
                <label>Límite de crédito</label>
                <input type="number" step="0.01" name="limite_credito" class="form-control" value="{{ $cliente->limite_credito }}">
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="activo" {{ $cliente->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $cliente->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button class="btn btn-primary">
                Actualizar Cliente
            </button>

        </form>

    </div>
</div>

@stop
