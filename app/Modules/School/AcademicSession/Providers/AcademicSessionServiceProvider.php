<?php
namespace App\Modules\School\AcademicSession\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\AcademicSession\Contracts\AcademicSessionServiceInterface;
use App\Modules\School\AcademicSession\Services\AcademicSessionService;

class AcademicSessionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AcademicSessionServiceInterface::class, AcademicSessionService::class);

        $this->app->singleton('academic_sessions', function ($app) {
            return $app->make(AcademicSessionServiceInterface::class);
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
