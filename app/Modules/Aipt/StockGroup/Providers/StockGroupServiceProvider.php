<?php

namespace Modules\Aipt\StockGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockGroup\Contracts\StockGroupRepositoryInterface;
use Modules\Aipt\StockGroup\Repositories\StockGroupRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockGroup\Contracts\StockGroupServiceInterface;
use Modules\Aipt\StockGroup\Services\StockGroupService;
use Modules\Aipt\StockGroup\Models\StockGroup;

class StockGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockGroupRepositoryInterface::class, function ($app) {
            return new StockGroupRepository(new StockGroup());
        });
        $this->app->singleton(StockGroupServiceInterface::class, StockGroupService::class);
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
