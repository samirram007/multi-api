<?php
namespace Modules\School\AcademicStandard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\AcademicStandard\Contracts\AcademicStandardServiceInterface;
use Modules\School\AcademicStandard\Services\AcademicStandardService;

class AcademicStandardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AcademicStandardServiceInterface::class, AcademicStandardService::class);

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
