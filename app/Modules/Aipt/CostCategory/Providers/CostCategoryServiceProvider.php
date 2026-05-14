<?php

namespace Modules\Aipt\CostCategory\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\CostCategory\Contracts\CostCategoryServiceInterface;
use Modules\Aipt\CostCategory\Services\CostCategoryService;

class CostCategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CostCategoryServiceInterface::class, CostCategoryService::class);
      
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
