<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path ke halaman setelah login.
     */
    public const HOME = '/';

    /**
     * Daftarkan route untuk aplikasi.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Route untuk web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
