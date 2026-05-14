<?php

namespace Modules\Aipt\StockSummary\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockSummary\Contracts\StockSummaryServiceInterface;
use Modules\Aipt\StockSummary\Services\StockSummaryService;

class StockSummaryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockSummaryServiceInterface::class, StockSummaryService::class);
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
