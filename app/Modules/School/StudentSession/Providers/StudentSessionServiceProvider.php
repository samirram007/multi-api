<?php
namespace Modules\School\StudentSession\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\StudentSession\Contracts\StudentSessionServiceInterface;
use Modules\School\StudentSession\Services\StudentSessionService;

class StudentSessionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StudentSessionServiceInterface::class, StudentSessionService::class);




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
