<?php
namespace App\Modules\School\ExaminationResult\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationResult\Contracts\ExaminationResultServiceInterface;
use App\Modules\School\ExaminationResult\Services\ExaminationResultService;

class ExaminationResultServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExaminationResultServiceInterface::class, ExaminationResultService::class);

        $this->app->singleton('examination_results', function ($app) {
            return $app->make(ExaminationResultServiceInterface::class);
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
