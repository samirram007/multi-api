<?php
namespace App\Modules\School\Examination\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Examination\Contracts\ExaminationServiceInterface;
use App\Modules\School\Examination\Services\ExaminationService;

class ExaminationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExaminationServiceInterface::class, ExaminationService::class);

        $this->app->singleton('examinations', function ($app) {
            return $app->make(ExaminationServiceInterface::class);
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
