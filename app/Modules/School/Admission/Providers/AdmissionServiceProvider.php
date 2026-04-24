<?php
namespace App\Modules\School\Admission\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Admission\Contracts\AdmissionServiceInterface;
use App\Modules\School\Admission\Services\AdmissionService;

class AdmissionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AdmissionServiceInterface::class, AdmissionService::class);

        $this->app->singleton('admissions', function ($app) {
            return $app->make(AdmissionServiceInterface::class);
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
