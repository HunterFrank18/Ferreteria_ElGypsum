<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
       <link rel="stylesheet" href="{{ asset('css/lomasnuevo.css')}}">



</head>
<body>

<style>
body {
    background: url("{{ asset('Fondos/ferreteria2.jpg') }}");
    background-repeat: no-repeat;
   background-size: cover;
}
</style>

    <header>
        <div class="contenedor">
            <h4>Echale un vistazo a nuestros nuevos productos y adquiere el tuyo<br>Selecciona el que mas te guste y haz click en el icono de whastapp</h4>
        </div>

    </header>


<div class="conte">
    <div class="card Mariow">
        <img src="{{ asset('Herramientas/taladro_total.jpg') }}" alt="">
    </div>
    <div class="informacion">
        <h1>
            <a href="https://wa.me/505865023595">Taladro Total</a>
        </h1>
        <p class="fecha">
            Taladro de 750 W de potencia, apto para trabajos caseros y profesionales
        </p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1">
                <a href="https://wa.me/505865023595">
                    <i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i>
                </a>
            </span>
        </div>
        <span class="shopping">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
        </span>
    </div>
</div>




<div class="conte">
    <div class="card Mariow">
         <img src="{{ asset('Herramientas/pulidora.jpg') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Pulidora Total</a></h1>
        <p class="fecha">Pulidora de 4 1/2, ideal para corte fino, desbaste, para madera</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
        <span class="shopping"> <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">
         <img src="{{ asset('Herramientas/fumigadora_total.jpg') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Fumigadora Total</a></h1>
        <p class="fecha">Fumigadora tipo mochila total de 16 litros</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
        <span class="shopping"> <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">
         <img src="{{ asset('Herramientas/paint_zoom.jpg') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Paint-Zoom Total</a></h1>
        <p class="fecha">Pinta con la mayor comodidad y con un mejor desempeño</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
         <span class="shopping">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">
         <img src="{{ asset('Herramientas/sierra.jpg') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Circular Total</a></h1>
        <p class="fecha">Cirular ideal para tus cortes de madera para trabajos caseros y grandes proyectos</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
           <span class="shopping">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">
         <img src="{{ asset('Herramientas/fumigadora1.5.png') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Fumigadora de 1.5 litros</a></h1>
        <p class="fecha">Perfecta para fumigar o bien regar</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
           <span class="shopping">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">

         <img src="{{ asset('Herramientas/fumigadora.png') }}" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Fumigadora de 3 litros</a></h1>
        <p class="fecha">Ideal para fumigar en cantidad, controlar plagas etc</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
           <span class="shopping">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house-chimney fa-beat-fade" style="color:#dcc6c6;"></i>
            </a>
    </div>
</div>

<!--

<div class="conte">
    <div class="card Mariow">
        <img src="Herramientas/taladro total.jpg" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Taladro Total</a></h1>
        <p class="fecha">Taladro de 750 W de potencia, apto para trabajos caseros y profesionales<br>Incluye rotomartillo y regulador de potencia</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
        <span class="shopping"><a href="index.html"><i class="fa-solid fa-house-chimney fa-beat-fade" style="color: #dcc6c6;"></i></a></span>
    </div>
</div>

<div class="conte">
    <div class="card Mariow">
        <img src="Herramientas/pulidora total.jpg" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Pulidora Total</a></h1>
        <p class="fecha">Taladro de 750 W de potencia, apto para trabajos caseros y profesionales<br>Incluye rotomartillo y regulador de potencia</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
        <span class="shopping"><a href="index.html"><i class="fa-solid fa-house-chimney fa-beat-fade" style="color: #dcc6c6;"></i></a></span>
    </div>
</div>
<div class="conte">
    <div class="card Mariow">
        <img src="Herramientas/taladro total.jpg" alt="">
    </div>
    <div class="informacion">
        <h1><a href="https://wa.me/505865023595">Taladro Total</a></h1>
        <p class="fecha">Taladro de 750 W de potencia, apto para trabajos caseros y profesionales<br>Incluye rotomartillo y regulador de potencia</p>
    </div>
    <div class="precio">
        <div class="box-precio">
            <span class="precio1"><a href="https://wa.me/505865023595"><i class="fa-brands fa-whatsapp fa-xl fa-beat-fade"></i></a></span>

        </div>
        <span class="shopping"><a href="index.html"><i class="fa-solid fa-house-chimney fa-beat-fade" style="color: #dcc6c6;"></i></a></span>
    </div>

</div>
 -->

</body>
<!-- jQuery primero -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

<script src="{{ asset('js/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<!-- Tus scripts -->
<script src="{{ asset('js/carrito.js') }}"></script>
<script src="{{ asset('js/pedido.js') }}"></script>

</html>
