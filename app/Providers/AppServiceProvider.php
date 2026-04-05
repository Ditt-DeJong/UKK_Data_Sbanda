<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Share data notifications for all admin views and the notification modal
        \Illuminate\Support\Facades\View::composer(['admin.*', 'components.notifModal'], function ($view) {
            $dataSiswaPending = \App\Models\DataSiswa::with(['user', 'orangTua'])
                ->where('status_approval', 'pending')
                ->orderBy('created_at', 'desc')
                ->get();

            $view->with([
                'dataSiswaPending' => $dataSiswaPending,
                'notifCount' => $dataSiswaPending->count(),
            ]);
        });
    }
}
