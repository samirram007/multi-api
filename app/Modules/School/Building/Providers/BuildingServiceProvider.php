<?php
namespace Modules\School\Building\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Building\Contracts\BuildingServiceInterface;
use Modules\School\Building\Services\BuildingService;

class BuildingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BuildingServiceInterface::class, BuildingService::class);

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
