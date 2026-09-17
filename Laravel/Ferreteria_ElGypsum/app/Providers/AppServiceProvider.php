<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Register route middleware alias 'role' for RoleMiddleware
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);

        // Forzar HTTPS en producción (evita Mixed Content detrás del proxy de Render)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
