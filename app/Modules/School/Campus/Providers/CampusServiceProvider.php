<?php
namespace App\Modules\School\Campus\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Campus\Contracts\CampusServiceInterface;
use App\Modules\School\Campus\Services\CampusService;

class CampusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CampusServiceInterface::class, CampusService::class);

        $this->app->singleton('campuses', function ($app) {
            return $app->make(CampusServiceInterface::class);
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
