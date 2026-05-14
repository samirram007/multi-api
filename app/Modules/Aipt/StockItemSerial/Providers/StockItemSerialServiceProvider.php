<?php

namespace Modules\Aipt\StockItemSerial\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItemSerial\Contracts\StockItemSerialServiceInterface;
use Modules\Aipt\StockItemSerial\Services\StockItemSerialService;

class StockItemSerialServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockItemSerialServiceInterface::class, StockItemSerialService::class);
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
