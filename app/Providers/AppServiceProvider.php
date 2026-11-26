<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\VehiculosInterface;
use App\Repositories\VehiculosRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VehiculosInterface::class, VehiculosRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
