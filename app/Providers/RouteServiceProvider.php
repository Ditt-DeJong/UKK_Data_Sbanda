<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
