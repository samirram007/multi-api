<?php
namespace App\Modules\School\Floor\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Floor\Contracts\FloorServiceInterface;
use App\Modules\School\Floor\Services\FloorService;

class FloorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FloorServiceInterface::class, FloorService::class);

        $this->app->singleton('floors', function ($app) {
            return $app->make(FloorServiceInterface::class);
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
