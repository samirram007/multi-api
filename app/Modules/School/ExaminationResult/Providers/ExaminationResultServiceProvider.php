<?php
namespace Modules\School\ExaminationResult\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\ExaminationResult\Contracts\ExaminationResultServiceInterface;
use Modules\School\ExaminationResult\Services\ExaminationResultService;

class ExaminationResultServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExaminationResultServiceInterface::class, ExaminationResultService::class);

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
