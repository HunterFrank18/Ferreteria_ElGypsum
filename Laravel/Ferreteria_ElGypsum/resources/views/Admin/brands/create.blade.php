@extends('adminlte::page')

@section('title', 'Crear Marca')

@section('content_header')
<h1>Crear Marca</h1>
@stop

@section('content')

<form action="{{ route('admin.brands.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <label>Nombre</label>

        <input type="text" name="name" class="form-control">

        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <br>

    <button class="btn btn-primary">
        Guardar
    </button>

    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

</form>

@stop
