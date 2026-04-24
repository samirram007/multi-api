<?php
namespace App\Modules\School\Building\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Building\Contracts\BuildingServiceInterface;
use App\Modules\School\Building\Services\BuildingService;

class BuildingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BuildingServiceInterface::class, BuildingService::class);

        $this->app->singleton('buildings', function ($app) {
            return $app->make(BuildingServiceInterface::class);
        });


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
