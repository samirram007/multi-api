<?php

namespace Modules\Aipt\CostCategory\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\CostCategory\Contracts\CostCategoryRepositoryInterface;
use Modules\Aipt\CostCategory\Repositories\CostCategoryRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\CostCategory\Contracts\CostCategoryServiceInterface;
use Modules\Aipt\CostCategory\Services\CostCategoryService;
use Modules\Aipt\CostCategory\Models\CostCategory;

class CostCategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CostCategoryRepositoryInterface::class, function ($app) {
            return new CostCategoryRepository(new CostCategory());
        });
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
