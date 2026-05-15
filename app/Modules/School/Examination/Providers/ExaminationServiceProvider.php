<?php
namespace Modules\School\Examination\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Examination\Contracts\ExaminationServiceInterface;
use Modules\School\Examination\Services\ExaminationService;

class ExaminationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExaminationServiceInterface::class, ExaminationService::class);

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
