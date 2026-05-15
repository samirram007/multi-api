<?php
namespace Modules\School\Guardian\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Guardian\Contracts\GuardianServiceInterface;
use Modules\School\Guardian\Services\GuardianService;

class GuardianServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GuardianServiceInterface::class, GuardianService::class);

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
