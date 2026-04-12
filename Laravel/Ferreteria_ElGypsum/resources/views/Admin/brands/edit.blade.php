@extends('adminlte::page')

@section('title', 'Editar Marca')

@section('content_header')
<h1>Editar Marca</h1>
@stop

@section('content')

<form action="{{ route('admin.brands.update',$brand) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nombre</label>

        <input type="text" name="name" class="form-control"
               value="{{ $brand->name }}">

        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <br>

    <button class="btn btn-primary">
        Actualizar
    </button>

    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

</form>

@stop
