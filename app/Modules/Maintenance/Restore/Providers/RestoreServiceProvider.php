<?php
namespace App\Modules\Maintenance\Restore\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Maintenance\Restore\Contracts\RestoreServiceInterface;
use App\Modules\Maintenance\Restore\Services\RestoreService;

class RestoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RestoreServiceInterface::class, RestoreService::class);

        $this->app->singleton('restores', function ($app) {
            return $app->make(RestoreServiceInterface::class);
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
