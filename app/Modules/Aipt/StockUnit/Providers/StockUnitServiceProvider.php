<?php

namespace Modules\Aipt\StockUnit\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockUnit\Contracts\StockUnitRepositoryInterface;
use Modules\Aipt\StockUnit\Repositories\StockUnitRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockUnit\Contracts\StockUnitServiceInterface;
use Modules\Aipt\StockUnit\Services\StockUnitService;

class StockUnitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockUnitRepositoryInterface::class, StockUnitRepository::class);
        $this->app->singleton(StockUnitServiceInterface::class, StockUnitService::class);
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
