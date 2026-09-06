<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lo mas nuevo | Ferreteria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lomasnuevo.css') }}">
</head>
<body>
@php
    $whatsapp = 'https://wa.me/505865023595';
@endphp


<header class="store-header">
    <div class="top-line">
        <div class="container">
            <span><i class="fa-brands fa-whatsapp"></i> Cotiza rapido por WhatsApp</span>
            <span><i class="fa-solid fa-truck-fast"></i> Consulta disponibilidad y entrega</span>
        </div>
    </div>

    <nav class="catalog-nav">
        <div class="container">
            <a class="brand" href="{{ url('/') }}">
                <span><i class="fa-solid fa-hammer"></i></span>
                Ferreteria El Gypsum
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}">Inicio</a>
                <a class="active" href="#">Lo mas nuevo</a>
                <a href="{{ $whatsapp }}">Cotizar</a>
            </div>

            <a class="nav-whatsapp" href="{{ $whatsapp }}" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </nav>
</header>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <span class="section-kicker"><i class="fa-solid fa-bolt"></i> Lo mas nuevo</span>
                <h1>Nuevos productos para que tu proyecto avance.</h1>
                <p>Explora herramientas, fumigadoras y equipos recien agregados. Toca el boton de WhatsApp y te confirmamos precio, existencia y recomendacion.</p>
                <div class="hero-actions">
                    <a class="btn-primary-store" href="#productos">
                        <i class="fa-solid fa-box-open"></i>
                        Ver productos
                    </a>
                    <a class="btn-secondary-store" href="{{ $whatsapp }}">
                        <i class="fa-brands fa-whatsapp"></i>
                        Cotizar ahora
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="quick-stats">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <div>
                            <strong>Herramientas listas</strong>
                            <span>Equipos para hogar, taller y obra.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-comments-dollar"></i>
                        <div>
                            <strong>Cotizacion directa</strong>
                            <span>Pregunta precio desde cada producto.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <div>
                            <strong>Compra con asesoria</strong>
                            <span>Te orientamos segun tu necesidad.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="productos" class="catalog-section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-layer-group"></i> Catalogo actualizado</span>
                    <h2>Productos nuevos</h2>
                    <p>Una vista mas clara, ordenada y facil de revisar desde celular o computadora.</p>
                </div>

                <a class="btn-outline-store" href="{{ url('/') }}">
                    <i class="fa-solid fa-house"></i>
                    Volver al inicio
                </a>
            </div>

            <div class="product-grid">
               @forelse ($productos as $producto)
    <article class="product-card">
        <a class="product-image" href="{{ $whatsapp }}">
            <img src="{{ $producto->image ? asset('storage/' . $producto->image) : asset('Fondos/ferreteria2.jpg') }}" alt="{{ $producto->name }}">
            <span class="product-badge">Nuevo</span>
        </a>

        <div class="product-info">
            <span class="product-category">{{ optional($producto->category)->name ?? 'Producto nuevo' }}</span>
            <h3>{{ $producto->name }}</h3>
            <p>{{ $producto->description ?? 'Producto recien agregado a nuestro catalogo. Escribenos para consultar precio, stock y recomendaciones.' }}</p>
        </div>

        <div class="product-footer">
            <span class="availability"><i class="fa-solid fa-circle"></i> Consultar disponibilidad</span>
            <a class="whatsapp-button" href="{{ $whatsapp }}" aria-label="Cotizar {{ $producto->name }}">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </article>
@empty
    <div class="empty-state">
        <i class="fa-solid fa-box-open"></i>
        <h3>Aun no hay productos nuevos</h3>
        <p>Cuando agregues productos activos desde el panel de administrador, apareceran automaticamente aqui.</p>
    </div>
@endforelse

            </div>
        </div>
    </section>

    <section class="quote-band">
        <div class="container">
            <div class="quote-panel">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-list-check"></i> Haz tu lista</span>
                    <h2>Mandanos los productos que te interesan.</h2>
                    <p>Te ayudamos con precio, existencia y alternativas si necesitas completar tu compra.</p>
                </div>
                <a class="btn-primary-store" href="{{ $whatsapp }}">
                    <i class="fa-brands fa-whatsapp"></i>
                    Escribir por WhatsApp
                </a>
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/carrito.js') }}"></script>
<script src="{{ asset('js/pedido.js') }}"></script>
</body>
</html>
