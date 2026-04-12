<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Panel Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f6f9;">

<nav class="navbar navbar-dark bg-dark">

<div class="container-fluid">

<a class="navbar-brand" href="{{ route('admin.dashboard') }}">
Panel de Administración
</a>

<a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
Ir a la tienda
</a>

</div>

<li class="nav-item dropdown">

<a class="nav-link" data-toggle="dropdown" href="#">

<i class="fas fa-bell"></i>

<span class="badge badge-danger navbar-badge">
{{ \App\Models\Product::where('stock','<=',5)->count() }}
</span>

</a>

<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

<span class="dropdown-item dropdown-header">
Productos con stock bajo
</span>

<div class="dropdown-divider"></div>

@foreach(\App\Models\Product::where('stock','<=',5)->take(5)->get() as $product)

<a href="{{ route('admin.products.edit',$product->id) }}" class="dropdown-item">

<i class="fas fa-exclamation-triangle text-danger"></i>

{{ $product->name }}

<span class="float-right text-muted text-sm">
Stock: {{ $product->stock }}
</span>

</a>

<div class="dropdown-divider"></div>

@endforeach

<a href="{{ route('admin.products.index') }}" class="dropdown-item dropdown-footer">

Ver todos

</a>

</div>

</li>

</nav>

<div class="container mt-4">

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.form-delete').forEach(form => {

form.addEventListener('submit', function(e){

e.preventDefault();

Swal.fire({

title:'¿Eliminar producto?',
text:'No podrás revertir esto',
icon:'warning',
showCancelButton:true,
confirmButtonText:'Sí eliminar',
cancelButtonText:'Cancelar'

}).then((result)=>{

if(result.isConfirmed){
form.submit();
}

});

});

});

</script>

</body>

</html>
