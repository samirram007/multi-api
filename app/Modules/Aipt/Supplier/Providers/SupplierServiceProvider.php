<?php

namespace Modules\Aipt\Supplier\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\Supplier\Contracts\SupplierRepositoryInterface;
use Modules\Aipt\Supplier\Repositories\SupplierRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Supplier\Contracts\SupplierServiceInterface;
use Modules\Aipt\Supplier\Services\SupplierService;
use Modules\Aipt\Supplier\Models\Supplier;

class SupplierServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SupplierRepositoryInterface::class, function ($app) {
            return new SupplierRepository(new Supplier());
        });
        $this->app->singleton(SupplierServiceInterface::class, SupplierService::class);
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
