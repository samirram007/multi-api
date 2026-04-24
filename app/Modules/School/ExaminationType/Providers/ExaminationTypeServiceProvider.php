<?php
namespace App\Modules\School\ExaminationType\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationType\Contracts\ExaminationTypeServiceInterface;
use App\Modules\School\ExaminationType\Services\ExaminationTypeService;

class ExaminationTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExaminationTypeServiceInterface::class, ExaminationTypeService::class);

        $this->app->singleton('examination_types', function ($app) {
            return $app->make(ExaminationTypeServiceInterface::class);
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
