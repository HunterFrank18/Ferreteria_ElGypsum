<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería El Gypsum</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

    <style>
        :root {
            --brand: #f6b400;
            --dark: #151515;
            --green: #198754;
            --text: #202020;
            --muted: #666;
            --bg: #f4f4f4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .top-bar {
            background: #111;
            color: #fff;
            padding: 8px 0;
            font-size: 14px;
        }

        .top-bar a {
            color: #fff;
        }

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .08);
        }

        .header-content {
            min-height: 82px;
            display: grid;
            grid-template-columns: 180px 1fr auto;
            gap: 22px;
            align-items: center;
        }

        .brand-logo img {
            max-width: 155px;
            height: auto;
        }

        .search-box {
            display: flex;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
        }

        .search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            padding: 12px 14px;
        }

        .search-box button {
            width: 54px;
            border: 0;
            background: var(--brand);
            color: #111;
            font-size: 18px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        .header-actions a,
        .header-actions button {
            border: 0;
            background: transparent;
            color: #111;
            font-weight: 700;
            padding: 8px 10px;
        }

        .quote-btn {
            background: var(--green) !important;
            color: #fff !important;
            border-radius: 8px;
        }

        .nav-cats {
            background: var(--dark);
        }

        .nav-cats ul {
            display: flex;
            gap: 2px;
            list-style: none;
            margin: 0;
            padding: 0;
            overflow-x: auto;
        }

        .nav-cats a {
            display: block;
            color: #fff;
            padding: 13px 18px;
            font-weight: 700;
            font-size: 15px;
        }

        .nav-cats a:hover {
            background: var(--brand);
            color: #111;
        }

        .cart-dropdown {
            min-width: 380px;
            padding: 14px;
        }

        .cart-dropdown table {
            font-size: 14px;
        }

        .hero-slide {
            min-height: 460px;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, .78), rgba(0, 0, 0, .34)), url("{{ asset('Fondos/ferreteria.jpg') }}");
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 680px;
            padding: 60px 0 82px;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--brand);
            color: #111;
            border-radius: 999px;
            padding: 8px 14px;
            font-weight: 900;
            margin-bottom: 18px;
        }

        .hero-content h1 {
            font-size: clamp(36px, 5vw, 62px);
            font-weight: 900;
            line-height: 1.03;
            margin-bottom: 18px;
            letter-spacing: 0;
        }

        .hero-content p {
            font-size: 19px;
            max-width: 560px;
            margin-bottom: 26px;
        }

        .btn-brand {
            background: var(--brand);
            color: #111;
            border: 0;
            border-radius: 8px;
            padding: 12px 18px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-white {
            background: #fff;
            color: #111;
            border: 0;
            border-radius: 8px;
            padding: 12px 18px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .benefits {
            margin-top: -42px;
            position: relative;
            z-index: 2;
        }

        .benefit-grid {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .14);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            overflow: hidden;
        }

        .benefit-item {
            padding: 22px;
            display: flex;
            gap: 14px;
            align-items: center;
            border-right: 1px solid #eee;
        }

        .benefit-item:last-child {
            border-right: 0;
        }

        .benefit-item i {
            color: var(--brand);
            font-size: 28px;
        }

        .benefit-item strong {
            display: block;
            font-size: 16px;
        }

        .benefit-item span {
            color: var(--muted);
            font-size: 14px;
        }

        .section {
            padding: 58px 0;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 18px;
            margin-bottom: 24px;
        }

        .section-title h2 {
            font-weight: 900;
            margin: 0;
        }

        .section-title p {
            color: var(--muted);
            margin: 6px 0 0;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .category-tile {
            background: #fff;
            border-radius: 8px;
            padding: 24px 18px;
            color: #111;
            min-height: 145px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .category-tile:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, .13);
            color: #111;
        }

        .category-tile i {
            font-size: 34px;
            color: var(--brand);
        }

        .category-tile strong {
            font-size: 18px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .product-media {
            height: 180px;
            background: linear-gradient(135deg, #242424, #555);
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 58px;
            position: relative;
            overflow: hidden;
        }

        .product-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-sale {
            position: absolute;
            left: 12px;
            top: 12px;
            background: var(--brand);
            color: #111;
            border-radius: 999px;
            padding: 6px 10px;
            font-weight: 900;
            font-size: 13px;
            z-index: 1;
        }

        .stock-badge {
            position: absolute;
            right: 12px;
            top: 12px;
            background: rgba(0, 0, 0, .78);
            color: #fff;
            border-radius: 999px;
            padding: 6px 10px;
            font-weight: 800;
            font-size: 13px;
            z-index: 1;
        }

        .product-body {
            padding: 16px;
        }

        .product-body small {
            color: #777;
            font-weight: 700;
        }

        .product-body h3 {
            font-size: 17px;
            min-height: 44px;
            margin: 8px 0;
            font-weight: 900;
        }

        .product-meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .price,
        .precio {
            font-size: 21px;
            font-weight: 900;
            color: #111;
            margin-bottom: 12px;
        }

        .product-actions {
            display: grid;
            grid-template-columns: 1fr 44px;
            gap: 8px;
        }

        .product-actions button,
        .product-actions a {
            border-radius: 8px;
            border: 0;
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
        }

        .add-btn {
            background: var(--brand);
            color: #111;
        }

        .whatsapp-btn {
            background: var(--green);
            color: #fff;
        }

        .quote-band {
            background: #171717;
            color: #fff;
            padding: 54px 0;
        }

        .quote-band-content {
            display: grid;
            grid-template-columns: 1.5fr .8fr;
            gap: 30px;
            align-items: center;
        }

        .quote-band h2 {
            font-size: clamp(30px, 4vw, 46px);
            font-weight: 900;
            margin-bottom: 12px;
        }

        .quote-steps {
            display: grid;
            gap: 12px;
        }

        .quote-step {
            background: rgba(255, 255, 255, .08);
            border-radius: 8px;
            padding: 14px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .quote-step i {
            color: var(--brand);
            font-size: 22px;
        }

        .empty-products {
            background: #fff;
            border-radius: 8px;
            padding: 28px;
            color: #666;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        .footer {
            background: #0f0f0f;
            color: #fff;
            padding: 42px 0 18px;
        }

        .footer a {
            color: #ddd;
        }

        .footer h4 {
            color: var(--brand);
            font-weight: 900;
            margin-bottom: 14px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social-link a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #222;
            border-radius: 8px;
            margin-right: 8px;
            color: #fff;
        }

        @media (max-width: 992px) {
            .header-content {
                grid-template-columns: 130px 1fr;
            }

            .header-actions {
                grid-column: 1 / -1;
                justify-content: space-between;
                padding-bottom: 12px;
            }

            .benefit-grid,
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .category-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .quote-band-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .header-content {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 12px 0;
            }

            .brand-logo {
                text-align: center;
            }

            .hero-slide {
                min-height: 500px;
            }

            .benefit-grid,
            .products-grid,
            .category-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                display: block;
            }

            .header-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .cart-dropdown {
                min-width: 310px;
            }
        }
    </style>
</head>

<body>
    @php
        $productosNuevos = $productosNuevos ?? collect();
        $masVendidos = $masVendidos ?? collect();
    @endphp

    <div class="top-bar">
        <div class="container d-flex justify-content-between gap-3 flex-wrap">
            <span><i class="fa-solid fa-truck-fast"></i> Delivery gratis en todos tus pedidos</span>
            <span>
                <a href="https://wa.me/505865023595">
                    <i class="fab fa-whatsapp"></i> +505 8650 2359
                </a>
            </span>
        </div>
    </div>

    <header class="main-header">
        <div class="container header-content">
            <a class="brand-logo" href="{{ url('/') }}">
                <img src="{{ asset('Fondos/Logo Ferreteria El gypsum.png') }}" alt="Ferretería El Gypsum">
            </a>

            <form class="search-box" action="#" method="GET">
                <input type="search" name="buscar" placeholder="Buscar herramientas, tubos, breakers, duchas...">
                <button type="submit" aria-label="Buscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <div class="header-actions">
                @auth
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-gauge-high"></i> Admin
                    </a>

                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i> Salir
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <i class="fa-solid fa-user"></i> Entrar
                    </a>
                    <a href="{{ route('register') }}">Registro</a>
                @endauth

                <div class="dropdown" id="carrito">
                    <button class="quote-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-cart-shopping"></i> Cotización
                    </button>

                    <div class="dropdown-menu dropdown-menu-end cart-dropdown">
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-2" id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Img</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <div class="d-grid gap-2">
                            <button id="vaciar-carrito" class="btn btn-outline-danger btn-sm" type="button">
                                Vaciar cotización
                            </button>
                            <button id="procesar-pedido" class="btn btn-success btn-sm" type="button">
                                Procesar cotización
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="nav-cats">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/lomasnuevo') }}">Lo más nuevo</a></li>
                    <li><a href="{{ url('energy') }}">Electricidad</a></li>
                    <li><a href="{{ url('/bano') }}">Baño</a></li>
                    <li><a href="{{ url('/plumb') }}">Plomería</a></li>
                    <li><a href="{{ url('security') }}">Seguridad</a></li>
                    <li><a href="{{ url('/tools') }}">Herramientas</a></li>
                    <li><a href="{{ url('/screw') }}">Tornillería</a></li>
                    <li><a href="{{ url('/paint') }}">Pinturas</a></li>
                    <li><a href="{{ url('/soporte') }}">Soporte</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="lista-productos">
        <section id="heroFerreteria" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroFerreteria" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#heroFerreteria" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroFerreteria" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero-slide">
                        <div class="container">
                            <div class="hero-content">
                                <span class="hero-kicker">
                                    <i class="fa-solid fa-bolt"></i> Cotización rápida
                                </span>
                                <h1>Todo para tu obra, reparación o proyecto.</h1>
                                <p>Elegí tus productos, armá tu cotización en PDF y un vendedor te contacta para confirmar disponibilidad.</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#productos-nuevos" class="btn-brand">Ver productos</a>
                                    <a href="{{ url('/compra') }}" class="btn-white">Cotizar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="hero-slide">
                        <div class="container">
                            <div class="hero-content">
                                <span class="hero-kicker">
                                    <i class="fa-solid fa-truck"></i> Delivery gratis
                                </span>
                                <h1>Comprá sin moverte de donde estás.</h1>
                                <p>Atención por WhatsApp, productos ferreteros y entrega directa para clientes de hogar, maestros y obras.</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="https://wa.me/505865023595" class="btn-brand">Escribir por WhatsApp</a>
                                    <a href="#categorias" class="btn-white">Ver categorías</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="hero-slide">
                        <div class="container">
                            <div class="hero-content">
                                <span class="hero-kicker">
                                    <i class="fa-solid fa-tags"></i> Productos disponibles
                                </span>
                                <h1>Herramientas, electricidad, baño y plomería.</h1>
                                <p>Encontrá productos nuevos, recomendados y soluciones listas para resolver rápido.</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#mas-vendidos" class="btn-brand">Más vendidos</a>
                                    <a href="{{ url('/soporte') }}" class="btn-white">Necesito ayuda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="benefit-grid">
                    <div class="benefit-item">
                        <i class="fa-solid fa-truck-fast"></i>
                        <div>
                            <strong>Delivery gratis</strong>
                            <span>En todos tus pedidos</span>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <i class="fa-solid fa-file-pdf"></i>
                        <div>
                            <strong>Cotización PDF</strong>
                            <span>Lista clara y ordenada</span>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <strong>Atención rápida</strong>
                            <span>Contacto por WhatsApp</span>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <div>
                            <strong>Todo ferretero</strong>
                            <span>Hogar, obra y negocio</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="categorias" class="section">
            <div class="container">
                <div class="section-title">
                    <div>
                        <h2>Compra por categorías</h2>
                        <p>Entrá directo a lo que necesitás.</p>
                    </div>
                </div>

                <div class="category-grid">
                    <a class="category-tile" href="{{ url('energy') }}">
                        <i class="fa-regular fa-lightbulb"></i>
                        <strong>Electricidad</strong>
                    </a>
                    <a class="category-tile" href="{{ url('/bano') }}">
                        <i class="fa-solid fa-shower"></i>
                        <strong>Baño</strong>
                    </a>
                    <a class="category-tile" href="{{ url('/plumb') }}">
                        <i class="fa-solid fa-toilet"></i>
                        <strong>Plomería</strong>
                    </a>
                    <a class="category-tile" href="{{ url('security') }}">
                        <i class="fa-solid fa-lock"></i>
                        <strong>Seguridad</strong>
                    </a>
                    <a class="category-tile" href="{{ url('/tools') }}">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <strong>Herramientas</strong>
                    </a>
                    <a class="category-tile" href="{{ url('/tornilleria') }}">
                        <i class="fa-solid fa-screwdriver"></i>
                        <strong>Tornillería</strong>
                    </a>
                    <a class="category-tile" href="{{ url('/paint') }}">
                        <i class="fa-solid fa-paint-roller"></i>
                        <strong>Pinturas</strong>
                    </a>
                </div>
            </div>
        </section>

        <section id="productos-nuevos" class="section bg-white">
            <div class="container">
                <div class="section-title">
                    <div>
                        <h2>Recién llegados</h2>
                        <p>Productos reales disponibles en inventario.</p>
                    </div>
                    <a href="{{ url('/lomasnuevo') }}" class="btn-brand">Ver más</a>
                </div>

                <div class="products-grid">
                    @forelse ($productosNuevos as $variant)
                        @php
                            $product = $variant->product;
                            $image = $product && $product->image
                                ? asset('storage/' . $product->image)
                                : asset('Fondos/ferreteria.jpg');
                            $title = ($product->name ?? 'Producto') . ' - ' . ($variant->brand->name ?? 'Sin marca');
                        @endphp

                        <article class="product-card">
                            <div class="product-media">
                                <span class="badge-sale">Nuevo</span>
                                <span class="stock-badge">Stock: {{ $variant->stock }}</span>
                                <img src="{{ $image }}" alt="{{ $title }}">
                            </div>

                            <div class="product-body">
                                <small>{{ $product->category->name ?? 'Producto' }}</small>
                                <h3>{{ $product->name ?? 'Producto sin nombre' }}</h3>
                                <div class="product-meta">
                                    Marca: {{ $variant->brand->name ?? 'Sin marca' }}
                                </div>
                                <div class="precio">
                                    C$ <span>{{ number_format($variant->price, 2, '.', '') }}</span>
                                </div>

                                <div class="product-actions">
                                    <button
                                        type="button"
                                        class="add-btn agregar-carrito"
                                        data-id="{{ $variant->id }}"
                                        data-titulo="{{ $title }}"
                                        data-precio="{{ number_format($variant->price, 2, '.', '') }}"
                                        data-imagen="{{ $image }}"
                                    >
                                        Agregar
                                    </button>

                                    <a class="whatsapp-btn" href="https://wa.me/505865023595">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-products">
                            No hay productos nuevos con stock disponible todavía.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="mas-vendidos" class="section">
            <div class="container">
                <div class="section-title">
                    <div>
                        <h2>Más vendidos</h2>
                        <p>Productos destacados para cotizar rápido.</p>
                    </div>
                </div>

                <div class="products-grid">
                    @forelse ($masVendidos as $variant)
                        @php
                            $product = $variant->product;
                            $image = $product && $product->image
                                ? asset('storage/' . $product->image)
                                : asset('Fondos/ferreteria.jpg');
                            $title = ($product->name ?? 'Producto') . ' - ' . ($variant->brand->name ?? 'Sin marca');
                        @endphp

                        <article class="product-card">
                            <div class="product-media">
                                <span class="badge-sale">Top</span>
                                <span class="stock-badge">Stock: {{ $variant->stock }}</span>
                                <img src="{{ $image }}" alt="{{ $title }}">
                            </div>

                            <div class="product-body">
                                <small>{{ $product->category->name ?? 'Producto' }}</small>
                                <h3>{{ $product->name ?? 'Producto sin nombre' }}</h3>
                                <div class="product-meta">
                                    Marca: {{ $variant->brand->name ?? 'Sin marca' }}
                                </div>
                                <div class="precio">
                                    C$ <span>{{ number_format($variant->price, 2, '.', '') }}</span>
                                </div>

                                <div class="product-actions">
                                    <button
                                        type="button"
                                        class="add-btn agregar-carrito"
                                        data-id="{{ $variant->id }}"
                                        data-titulo="{{ $title }}"
                                        data-precio="{{ number_format($variant->price, 2, '.', '') }}"
                                        data-imagen="{{ $image }}"
                                    >
                                        Agregar
                                    </button>

                                    <a class="whatsapp-btn" href="https://wa.me/505865023595">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-products">
                            No hay productos destacados con stock disponible todavía.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="cotizar" class="quote-band">
            <div class="container quote-band-content">
                <div>
                    <h2>Armá tu cotización y nosotros te contactamos.</h2>
                    <p>Seleccioná productos, completá tus datos y el sistema genera la cotización en PDF con precios, total, información del cliente y datos de la ferretería.</p>
                    <a href="{{ url('/compra') }}" class="btn-brand">
                        <i class="fa-solid fa-file-invoice-dollar"></i> Ir a cotización
                    </a>
                </div>

                <div class="quote-steps">
                    <div class="quote-step">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>Agregás productos a tu lista.</span>
                    </div>
                    <div class="quote-step">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Ingresás tu nombre y teléfono.</span>
                    </div>
                    <div class="quote-step">
                        <i class="fa-solid fa-bell"></i>
                        <span>El vendedor recibe la alerta en el panel.</span>
                    </div>
                    <div class="quote-step">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>Se genera la cotización en PDF.</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h4>Ferretería El Gypsum</h4>
                    <p>Materiales, herramientas y soluciones para tu hogar, obra o negocio.</p>
                </div>

                <div class="col-md-4">
                    <h4>Dirección</h4>
                    <ul>
                        <li>Mercado Ivan Montenegro, en el parqueo, contiguo al puesto.</li>
                        <li>
                            <a href="https://maps.app.goo.gl/NUgpKXqMRv6WZPZo7">
                                Ver ubicación en Google Maps
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4>Contactanos</h4>
                    <ul>
                        <li><a href="https://wa.me/505865023595">+505 8650 2359</a></li>
                        <li><a href="mailto:elgypsum@gmail.com">elgypsum@gmail.com</a></li>
                    </ul>

                    <div class="social-link mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/505865023595"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,.15); margin-top: 28px;">
            <p class="mb-0 text-center">Ferretería El Gypsum © {{ date('Y') }}. Todos los derechos reservados.</p>
        </div>
    </footer>

   <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/carrito.js') }}"></script>
<script src="{{ asset('js/pedido.js') }}"></script>

</body>

</html>
