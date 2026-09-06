<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte | Ferreteria El Gypsum</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/soporte.css') }}">
</head>
<body>
@php
    $whatsapp = 'https://wa.me/50557688045';
@endphp

<header class="support-header">
    <div class="top-line">
        <div class="container">
            <span><i class="fa-brands fa-whatsapp"></i> Atencion por WhatsApp</span>
            <span><i class="fa-solid fa-store"></i> Ferreteria El Gypsum</span>
        </div>
    </div>

    <nav class="support-nav">
        <div class="container">
            <a class="brand" href="{{ url('/') }}">
                <span><i class="fa-solid fa-hammer"></i></span>
                Ferreteria El Gypsum
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ url('/lomasnuevo') }}">Lo mas nuevo</a>
                <a class="active" href="{{ url('/soporte') }}">Soporte</a>
            </div>

            <a class="nav-whatsapp" href="{{ $whatsapp }}" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </nav>
</header>

<main>
    <section class="hero-support">
        <div class="container">
            <div class="hero-content">
                <span class="section-kicker"><i class="fa-solid fa-headset"></i> Soporte</span>
                <h1>Estamos para ayudarte con tu compra.</h1>
                <p>Te orientamos con productos, precios, disponibilidad, medidas, marcas y proformas para que compres con confianza.</p>

                <div class="hero-actions">
                    <a class="btn-primary-store" href="{{ $whatsapp }}">
                        <i class="fa-brands fa-whatsapp"></i>
                        Escribir por WhatsApp
                    </a>
                    <a class="btn-secondary-store" href="{{ url('/') }}">
                        <i class="fa-solid fa-store"></i>
                        Volver a la tienda
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="help-section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-circle-question"></i> Ayuda rapida</span>
                    <h2>¿En que podemos ayudarte?</h2>
                    <p>Estas son las consultas mas comunes que podemos resolverte rapido.</p>
                </div>
            </div>

            <div class="help-grid">
                <article class="help-card">
                    <i class="fa-solid fa-tags"></i>
                    <h3>Cotizaciones</h3>
                    <p>Mandanos tu lista de productos y te ayudamos con precios y disponibilidad.</p>
                </article>

                <article class="help-card">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <h3>Existencias</h3>
                    <p>Consultamos stock disponible por producto, marca, medida o presentacion.</p>
                </article>

                <article class="help-card">
                    <i class="fa-solid fa-ruler-combined"></i>
                    <h3>Medidas y variantes</h3>
                    <p>Te orientamos si no estas seguro de la medida, modelo o marca que necesitas.</p>
                </article>

                <article class="help-card">
                    <i class="fa-solid fa-file-invoice"></i>
                    <h3>Proformas</h3>
                    <p>Usa el carrito para armar tu compra y generar una proforma clara para revisar.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-logo">
                    <img
                        src="{{ asset('Fondos/Logo Ferreteria El gypsum.png') }}"
                        alt="Logo Ferreteria El Gypsum"
                        onerror="this.onerror=null; this.src='{{ asset('Fondos/ferreteria9.jpg') }}';"
                    >
                </div>

                <div class="about-content">
                    <span class="section-kicker"><i class="fa-solid fa-people-carry-box"></i> Quienes somos</span>
                    <h2>Ferreteria El Gypsum</h2>
                    <p>Somos una ferreteria enfocada en ayudarte a encontrar materiales, herramientas y accesorios para construccion, reparacion y mantenimiento.</p>
                    <p>Nuestra meta es darte una atencion cercana, precios competitivos y una experiencia de compra mas sencilla desde la tienda en linea.</p>

                    <div class="contact-panel">
                        <div>
                            <strong>Contacto principal</strong>
                            <span>Eliezer Mojica</span>
                        </div>
                        <a href="{{ $whatsapp }}">
                            <i class="fa-brands fa-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-comments"></i> Preguntas frecuentes</span>
                    <h2>Antes de escribirnos</h2>
                    <p>Algunas respuestas rapidas sobre compras, precios y proformas.</p>
                </div>
            </div>

            <div class="faq-grid">
                <article class="faq-item">
                    <h3>¿Como cotizo un producto?</h3>
                    <p>Agrega productos al carrito o escribinos directo por WhatsApp con el nombre, marca o medida que necesitas.</p>
                </article>

                <article class="faq-item">
                    <h3>¿Los precios cambian por marca?</h3>
                    <p>Si. Algunos productos tienen diferentes marcas, medidas o presentaciones, y cada variante puede tener su propio precio.</p>
                </article>

                <article class="faq-item">
                    <h3>¿Puedo generar una proforma?</h3>
                    <p>Si. Desde el carrito podes procesar la compra y generar una proforma para revisar tu lista.</p>
                </article>

                <article class="faq-item">
                    <h3>¿Que hago si no encuentro un producto?</h3>
                    <p>Escribinos por WhatsApp. Podemos revisar disponibilidad o recomendarte una alternativa.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-panel">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-message"></i> Contacto directo</span>
                    <h2>¿No encontraste lo que buscabas?</h2>
                    <p>Mandanos un mensaje y te ayudamos a encontrar el producto correcto.</p>
                </div>

                <a class="btn-primary-store" href="{{ $whatsapp }}">
                    <i class="fa-brands fa-whatsapp"></i>
                    Escribir ahora
                </a>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <strong>Ferreteria El Gypsum desarrollado por DharmaTech</strong>
        <span>Todo en materiales de construccion, herramientas y mantenimiento.</span>
    </div>
</footer>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
