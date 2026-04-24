<?php
namespace App\Modules\School\Fee\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Fee\Contracts\FeeServiceInterface;
use App\Modules\School\Fee\Services\FeeService;

class FeeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FeeServiceInterface::class, FeeService::class);

        $this->app->singleton('fees', function ($app) {
            return $app->make(FeeServiceInterface::class);
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
