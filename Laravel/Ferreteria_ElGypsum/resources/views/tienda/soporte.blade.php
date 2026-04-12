<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/soporte.css') }}"><link rel="stylesheet" href="soporte.css">
    <title>Quienes Somos</title>
</head>
<body>

<style>
        body {
            background: url("{{ asset('Fondos/ferreteria9.jpg') }}");
            min-height: 100vh;
            width: 100%;
            background-size: contain;
            background-repeat: repeat-x;


       }
       .pricing-header{
        color: antiquewhite;
       }
    </style>

    <header>
        <h4>Ferreteria El Gypsum<br></h4>
    </header>
    <div class="texto">
        <h3>TODO EN MATERIALES DE CONSTRUCCION</h3>
    </div>

    <section class="box">
        <img src={{ asset('Fondos/Logo Ferreteria El gypsum.png') }}" width="300" alt="" class="box-img">
        <h1>Eliezer Mojica</h1>
        <h2>Propietario, Fundador, Gerente General</h2>

       <ul>
        <li><a href="https://wa.me/50557688045"><i class="fa-brands fa-whatsapp" style="color: #16ff44;"></i></a></li><br>
        <li><a href="{{ url('/index') }}">Haz Click aqui para ir al inicio <i class="fa-solid fa-house-user" style="color: white";></i></a></li>
       </ul>
</section>

<section class="box1">
    <img src="bwengo.jpeg" width="180" alt="" class="box-img">
    <h1>Conoce nuestra historia</h1>
    <h2>Ferreteria el Gypsum fundada en el año 2020</h2>
    <p>nuestra mision es llevarte los mejores productos al mejor precio</p>

</section>


</body>
</html>
