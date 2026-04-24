<?php
namespace App\Modules\School\ExaminationStandard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationStandard\Contracts\ExaminationStandardServiceInterface;
use App\Modules\School\ExaminationStandard\Services\ExaminationStandardService;

class ExaminationStandardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExaminationStandardServiceInterface::class, ExaminationStandardService::class);

        $this->app->singleton('examination_standards', function ($app) {
            return $app->make(ExaminationStandardServiceInterface::class);
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
