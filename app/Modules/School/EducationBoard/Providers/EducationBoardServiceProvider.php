<?php
namespace App\Modules\School\EducationBoard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\EducationBoard\Contracts\EducationBoardServiceInterface;
use App\Modules\School\EducationBoard\Services\EducationBoardService;

class EducationBoardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EducationBoardServiceInterface::class, EducationBoardService::class);

        $this->app->singleton('education_boards', function ($app) {
            return $app->make(EducationBoardServiceInterface::class);
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
