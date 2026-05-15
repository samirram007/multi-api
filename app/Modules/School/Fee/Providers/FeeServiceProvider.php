<?php
namespace Modules\School\Fee\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Fee\Contracts\FeeServiceInterface;
use Modules\School\Fee\Services\FeeService;

class FeeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeServiceInterface::class, FeeService::class);

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
