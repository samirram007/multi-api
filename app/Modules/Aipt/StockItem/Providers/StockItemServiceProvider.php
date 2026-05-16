<?php

namespace Modules\Aipt\StockItem\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItem\Contracts\StockItemServiceInterface;
use Modules\Aipt\StockItem\Services\StockItemService;
use Modules\Aipt\StockItem\Contracts\StockItemRepositoryInterface;
use Modules\Aipt\StockItem\Repositories\StockItemRepository;

class StockItemServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockItemRepositoryInterface::class, StockItemRepository::class);
        $this->app->singleton(StockItemServiceInterface::class, StockItemService::class);
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
