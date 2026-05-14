<?php

namespace Modules\Aipt\HsnSacCode\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeServiceInterface;
use Modules\Aipt\HsnSacCode\Services\HsnSacCodeService;

class HsnSacCodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(HsnSacCodeServiceInterface::class, HsnSacCodeService::class);
        
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
