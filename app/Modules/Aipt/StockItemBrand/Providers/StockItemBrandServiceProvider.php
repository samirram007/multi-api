<?php

namespace Modules\Aipt\StockItemBrand\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockItemBrand\Contracts\StockItemBrandRepositoryInterface;
use Modules\Aipt\StockItemBrand\Repositories\StockItemBrandRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItemBrand\Contracts\StockItemBrandServiceInterface;
use Modules\Aipt\StockItemBrand\Services\StockItemBrandService;

class StockItemBrandServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockItemBrandRepositoryInterface::class, StockItemBrandRepository::class);
        $this->app->singleton(StockItemBrandServiceInterface::class, StockItemBrandService::class);
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
