<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ferreteria El Gypsum') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --auth-brand: #f6b400;
                --auth-brand-dark: #c47f00;
                --auth-dark: #111827;
                --auth-muted: #697386;
                --auth-line: #e5e7eb;
            }

            * {
                box-sizing: border-box;
            }

            body.auth-shell {
                min-height: 100vh;
                margin: 0;
                color: #111827;
                background-image:
                    linear-gradient(90deg, rgba(17, 24, 39, .92), rgba(17, 24, 39, .68), rgba(17, 24, 39, .86)),
                    url('/Fondos/ferreteria18.jpg');
                background-size: cover;
                background-position: center;
                font-family: Arial, Helvetica, sans-serif;
            }

            .auth-overlay {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 32px;
            }

            .auth-layout {
                width: min(1080px, 100%);
                min-height: 650px;
                display: grid;
                grid-template-columns: 1.05fr .95fr;
                overflow: hidden;
                background: rgba(255, 255, 255, .96);
                border: 1px solid rgba(255, 255, 255, .25);
                border-radius: 10px;
                box-shadow: 0 28px 90px rgba(0, 0, 0, .35);
            }

            .auth-hero {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 42px;
                color: #ffffff;
                background:
                    linear-gradient(160deg, rgba(17, 24, 39, .95), rgba(31, 41, 55, .72)),
                    url('/Fondos/ferreteria9.jpg');
                background-size: cover;
                background-position: center;
            }

            .auth-brand,
            .auth-mobile-brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                color: inherit;
                text-decoration: none;
            }

            .auth-brand span,
            .auth-mobile-brand span {
                width: 44px;
                height: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
                color: #111827;
                background: var(--auth-brand);
                font-weight: 900;
            }

            .auth-brand strong,
            .auth-mobile-brand strong {
                font-size: 20px;
                font-weight: 900;
            }

            .auth-copy {
                max-width: 520px;
            }

            .auth-kicker {
                display: inline-flex;
                margin-bottom: 14px;
                padding: 7px 11px;
                border-radius: 7px;
                color: #111827;
                background: var(--auth-brand);
                font-size: 13px;
                font-weight: 900;
                text-transform: uppercase;
            }

            .auth-copy h1 {
                margin: 0 0 16px;
                font-size: 46px;
                line-height: 1.05;
                font-weight: 900;
                letter-spacing: 0;
            }

            .auth-copy p {
                margin: 0;
                color: rgba(255, 255, 255, .84);
                font-size: 17px;
                line-height: 1.6;
            }

            .auth-benefits {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .auth-benefits div {
                padding: 16px;
                background: rgba(255, 255, 255, .1);
                border: 1px solid rgba(255, 255, 255, .18);
                border-radius: 8px;
            }

            .auth-benefits strong,
            .auth-benefits span {
                display: block;
            }

            .auth-benefits span {
                margin-top: 4px;
                color: rgba(255, 255, 255, .76);
                font-size: 13px;
            }

            .auth-panel {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 42px;
                background: #f8fafc;
            }

            .auth-mobile-brand {
                display: none;
                margin-bottom: 24px;
                color: #111827;
            }

            .auth-card {
                width: 100%;
                max-width: 430px;
                padding: 34px;
                background: #ffffff;
                border: 1px solid var(--auth-line);
                border-radius: 10px;
                box-shadow: 0 18px 45px rgba(17, 24, 39, .1);
            }

            .auth-card h2 {
                margin: 0;
                font-size: 28px;
                line-height: 1.1;
                font-weight: 900;
            }

            .auth-card p {
                color: var(--auth-muted);
            }

            .auth-card form label,
            .auth-card label {
                color: #1f2937;
                font-weight: 800;
            }

            .auth-card input[type='email'],
            .auth-card input[type='password'],
            .auth-card input[type='text'] {
                width: 100%;
                min-height: 46px;
                padding: 10px 12px;
                border: 1px solid #d1d5db;
                border-radius: 8px;
                outline: none;
            }

            .auth-card input:focus {
                border-color: var(--auth-brand);
                box-shadow: 0 0 0 3px rgba(246, 180, 0, .22);
            }

            .auth-card input[type='checkbox'] {
                width: 16px;
                height: 16px;
            }

            .auth-card a {
                color: #4b5563;
                font-weight: 700;
            }

            .auth-card a:hover {
                color: #111827;
            }

            .auth-card button[type='submit'] {
                min-height: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 0;
                border-radius: 8px;
                padding: 10px 18px;
                color: #111827;
                background: var(--auth-brand);
                font-weight: 900;
                cursor: pointer;
            }

            .auth-card button[type='submit']:hover {
                background: var(--auth-brand-dark);
            }

            @media (max-width: 900px) {
                .auth-layout {
                    grid-template-columns: 1fr;
                    min-height: auto;
                }

                .auth-hero {
                    display: none;
                }

                .auth-panel {
                    display: block;
                    padding: 30px;
                }

                .auth-mobile-brand {
                    display: inline-flex;
                }

                .auth-card {
                    max-width: none;
                }
            }

            @media (max-width: 560px) {
                .auth-overlay {
                    padding: 16px;
                }

                .auth-panel {
                    padding: 22px;
                }

                .auth-card {
                    padding: 24px;
                }
            }
        </style>
    </head>
    <body class="auth-shell text-gray-900 antialiased">
        <div class="auth-overlay">
            <div class="auth-layout">
                <section class="auth-hero">
                    <a class="auth-brand" href="/">
                        <span>FG</span>
                        <strong>Ferreteria El Gypsum</strong>
                    </a>

                    <div class="auth-copy">
                        <span class="auth-kicker">Panel de acceso</span>
                        <h1>Gestiona tu ferreteria con una entrada mas limpia.</h1>
                        <p>Productos, ventas, cotizaciones y clientes desde un entorno pensado para trabajar rapido.</p>
                    </div>

                    <div class="auth-benefits">
                        <div>
                            <strong>Inventario</strong>
                            <span>Productos, marcas y variantes.</span>
                        </div>
                        <div>
                            <strong>Ventas</strong>
                            <span>POS, pagos y proformas.</span>
                        </div>
                    </div>
                </section>

                <section class="auth-panel">
                    <a class="auth-mobile-brand" href="/">
                        <span>FG</span>
                        <strong>Ferreteria El Gypsum</strong>
                    </a>

                    <div class="auth-card">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
