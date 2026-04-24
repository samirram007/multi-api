<?php
namespace App\Modules\School\AcademicClass\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\AcademicClass\Contracts\AcademicClassServiceInterface;
use App\Modules\School\AcademicClass\Services\AcademicClassService;

class AcademicClassServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AcademicClassServiceInterface::class, AcademicClassService::class);

        $this->app->singleton('academic_classes', function ($app) {
            return $app->make(AcademicClassServiceInterface::class);
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
