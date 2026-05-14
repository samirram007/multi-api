<?php

namespace Modules\Aipt\StockCategory\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockCategory\Contracts\StockCategoryServiceInterface;
use Modules\Aipt\StockCategory\Services\StockCategoryService;

class StockCategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockCategoryServiceInterface::class, StockCategoryService::class);
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
