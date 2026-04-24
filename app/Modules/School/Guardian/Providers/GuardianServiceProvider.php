<?php
namespace App\Modules\School\Guardian\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Guardian\Contracts\GuardianServiceInterface;
use App\Modules\School\Guardian\Services\GuardianService;

class GuardianServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GuardianServiceInterface::class, GuardianService::class);

        $this->app->singleton('guardians', function ($app) {
            return $app->make(GuardianServiceInterface::class);
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
