<?php
namespace Modules\School\Subject\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Subject\Contracts\SubjectServiceInterface;
use Modules\School\Subject\Services\SubjectService;

class SubjectServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SubjectServiceInterface::class, SubjectService::class);




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
