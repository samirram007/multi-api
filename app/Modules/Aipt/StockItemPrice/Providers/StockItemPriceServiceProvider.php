<?php

namespace Modules\Aipt\StockItemPrice\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceRepositoryInterface;
use Modules\Aipt\StockItemPrice\Repositories\StockItemPriceRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceServiceInterface;
use Modules\Aipt\StockItemPrice\Services\StockItemPriceService;
use Modules\Aipt\StockItemPrice\Models\StockItemPrice;

class StockItemPriceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockItemPriceRepositoryInterface::class, function ($app) {
            return new StockItemPriceRepository(new StockItemPrice());
        });
        $this->app->singleton(StockItemPriceServiceInterface::class, StockItemPriceService::class);
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
