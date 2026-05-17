<?php

namespace Modules\Aipt\StockSummary\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockSummary\Contracts\StockSummaryRepositoryInterface;
use Modules\Aipt\StockSummary\Repositories\StockSummaryRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockSummary\Contracts\StockSummaryServiceInterface;
use Modules\Aipt\StockSummary\Services\StockSummaryService;
use Modules\Aipt\StockSummary\Models\StockSummary;

class StockSummaryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockSummaryRepositoryInterface::class, function ($app) {
            return new StockSummaryRepository(new StockSummary());
        });
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
