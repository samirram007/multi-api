<?php
namespace App\Modules\Pathology\Patient\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Pathology\Patient\Contracts\PatientServiceInterface;
use App\Modules\Pathology\Patient\Services\PatientService;

class PatientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PatientServiceInterface::class, PatientService::class);

        $this->app->singleton('patients', function ($app) {
            return $app->make(PatientServiceInterface::class);
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
