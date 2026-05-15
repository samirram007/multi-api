<?php
namespace Modules\School\SubjectGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\SubjectGroup\Contracts\SubjectGroupServiceInterface;
use Modules\School\SubjectGroup\Services\SubjectGroupService;

class SubjectGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SubjectGroupServiceInterface::class, SubjectGroupService::class);




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
