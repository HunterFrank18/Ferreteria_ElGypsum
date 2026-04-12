<!DOCTYPE html>
<html lang="en">
a
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <script src="{{ asset('js/popper.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
 <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/herramientas.css') }}">

    <title>Bienvenido a la categoria Electricidad</title>
</head>

<body>


<style>
        body {
            background: url("{{ asset('Fondos/ferreteria10.jpg') }}");
            min-height: 100vh;
            width: 100%;
            background-size: contain;
            background-repeat: repeat-y;

       }
       .pricing-header{
        color: antiquewhite;
       }
    </style>



    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="{{ url('/index') }}">Ferreteria El Gypsum <i class="fa-regular fa-lightbulb" style="color: #FFD43B;"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="{{ asset('img/cart.jpeg') }}" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">cabezabus</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/cabezabus.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Caja de herramientas</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/caja_herramientas.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>STANLEY</li>
                            <li>TRUPER</li>
                            <li>BOSCH</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cinta Metrica</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/cinta_truper.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Total</li>
                            <li>Dewalt</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Conector para Varilla polo</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/Conector.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Disco para Desbaste</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/disco_desbaste.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Total</li>
                            <li>Dewalt</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Disco para corte de metal</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/disco-para-corte-de-metal truper.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Dewalt</li>
                            <li>Total</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Eslabon para cadenas</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/eslabon.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Espiches para Gypsum</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/ESPICHE-PARA-GYPSUM-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Fumigadora de mano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/fumigadora.png') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Total</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>






            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Fumigadora de mochila</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/fumigadora_total.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Total</li>
                            <li>Truper</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Jaladera de puerta sencilla</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/jaladera_puerta.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Broca de Paleta para Madera</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/KIT-3-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Irwin</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Paint Zoom</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/paint_zoom.jpg') }}
                        " class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Total</li>
                            <li>Truper</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Pulidora</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/pulidora_truper.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Truper</li>
                            <li>Dewalt</li>
                            <li>Total</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Sierra/Cortadora de Madera</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/sierra.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"> <span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Total</li>
                            <li>Truper</li>
                            <li>Dewalt</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

                 <div class="container" id="lista-productos">

            </div>
            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Taladro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Herramientas/taladro.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>Total</li>
                            <li>Truper</li>
                            <li>Dewalt</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

 <!--


                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">ADVANCE</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/advance.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">869</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>3 GB RAM</li>
                            <li>COLOR NEGRO</li>
                            <li>64 GB DD</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">DELL</h4>
                    </div>
                    <div class="card-body">
                        <img src="img/dell.jpg" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio">S/. <span class="">5397</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>8 GB RAM</li>
                            <li>COLOR NEGRO</li>
                            <li>1 TB DD</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>


        </div>



    </div>
    <div class="container" id="lista-productos">

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">HP PAVILION</h4>
                </div>
                <div class="card-body">
                    <img src="img/hp1.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">5000</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>8 GB RAM</li>
                        <li>COLOR PLATEADO</li>
                        <li>256 GB DISCO SSD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">ACER </h4>
                </div>
                <div class="card-body">
                    <img src="img/acer.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">3000</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>16 GB RAM</li>
                        <li>COLOR NEGRO</li>
                        <li>1 TB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">LENOVO</h4>
                </div>
                <div class="card-body">
                    <img src="img/lenovo.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">4000</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>4 GB RAM</li>
                        <li>COLOR PLATEADO</li>
                        <li>1 TB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">APPLE</h4>
                </div>
                <div class="card-body">
                    <img src="img/apple.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">5900</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>8 GB RAM</li>
                        <li>COLOR GOLD</li>
                        <li>128 GB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">HUAWEI</h4>
                </div>
                <div class="card-body">
                    <img src="img/huawei.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">5769</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>8 GB RAM</li>
                        <li>COLOR NEGRO</li>
                        <li>256 GB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">SAMSUNG</h4>
                </div>
                <div class="card-body">
                    <img src="img/samsung.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">2599</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>4 GB RAM</li>
                        <li>COLOR BLANCO</li>
                        <li>64 GB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">LG</h4>
                </div>
                <div class="card-body">
                    <img src="img/lg.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">4299</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>8 GB RAM</li>
                        <li>COLOR PLATEADO</li>
                        <li>256 GB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">ADVANCE</h4>
                </div>
                <div class="card-body">
                    <img src="img/advance.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">869</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>3 GB RAM</li>
                        <li>COLOR NEGRO</li>
                        <li>64 GB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">DELL</h4>
                </div>
                <div class="card-body">
                    <img src="img/dell.jpg" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio">S/. <span class="">5397</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>8 GB RAM</li>
                        <li>COLOR NEGRO</li>
                        <li>1 TB DD</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                </div>
            </div>


        </div>
-->

    </div>
    </main>

    <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('js/carrito.js')}}"></script>
    <script src="{{ asset('js/pedido.js')}}"></script>

</body>

</html>
