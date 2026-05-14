<?php

namespace Modules\Aipt\Vendor\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Vendor\Contracts\VendorServiceInterface;
use Modules\Aipt\Vendor\Services\VendorService;

class VendorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VendorServiceInterface::class, VendorService::class);
    }

    public function boot(): void
    {
        $this->loadRoutes();
        $this->loadMigrations();
    }

    private function loadRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../Routes/api.php');
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
