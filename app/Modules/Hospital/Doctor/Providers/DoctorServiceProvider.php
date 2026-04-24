<?php
namespace App\Modules\Hospital\Doctor\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Hospital\Doctor\Contracts\DoctorServiceInterface;
use App\Modules\Hospital\Doctor\Services\DoctorService;

class DoctorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DoctorServiceInterface::class, DoctorService::class);

        $this->app->singleton('doctors', function ($app) {
            return $app->make(DoctorServiceInterface::class);
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
