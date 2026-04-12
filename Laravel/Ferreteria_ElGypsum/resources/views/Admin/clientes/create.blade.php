@extends('adminlte::page')

@section('title', 'Crear Cliente')

@section('content_header')
<h1>Crear Cliente</h1>
@stop

@section('content')

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('admin.clientes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <textarea name="direccion" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Límite de crédito</label>
                <input type="number" step="0.01" name="limite_credito" class="form-control" value="0">
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <button class="btn btn-success">
                Guardar Cliente
            </button>

        </form>

    </div>
</div>

@stop
