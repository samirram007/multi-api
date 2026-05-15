<?php
namespace Modules\School\ExaminationType\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\ExaminationType\Contracts\ExaminationTypeServiceInterface;
use Modules\School\ExaminationType\Services\ExaminationTypeService;

class ExaminationTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExaminationTypeServiceInterface::class, ExaminationTypeService::class);

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
