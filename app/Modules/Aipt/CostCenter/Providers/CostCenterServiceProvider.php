<?php

namespace Modules\Aipt\CostCenter\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\CostCenter\Contracts\CostCenterServiceInterface;
use Modules\Aipt\CostCenter\Services\CostCenterService;

class CostCenterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CostCenterServiceInterface::class, CostCenterService::class);
        
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
