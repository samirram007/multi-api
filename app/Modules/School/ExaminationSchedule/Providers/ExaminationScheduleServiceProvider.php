<?php
namespace App\Modules\School\ExaminationSchedule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationSchedule\Contracts\ExaminationScheduleServiceInterface;
use App\Modules\School\ExaminationSchedule\Services\ExaminationScheduleService;

class ExaminationScheduleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExaminationScheduleServiceInterface::class, ExaminationScheduleService::class);

        $this->app->singleton('examination_schedules', function ($app) {
            return $app->make(ExaminationScheduleServiceInterface::class);
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
