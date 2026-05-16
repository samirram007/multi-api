<?php
namespace Modules\School\AcademicClass\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\AcademicClass\Contracts\AcademicClassServiceInterface;
use Modules\School\AcademicClass\Services\AcademicClassService;
use Modules\School\AcademicClass\Contracts\AcademicClassRepositoryInterface;
use Modules\School\AcademicClass\Repositories\AcademicClassRepository;
use Modules\School\AcademicClass\Models\AcademicClass;

class AcademicClassServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AcademicClassServiceInterface::class, AcademicClassService::class);
        $this->app->singleton(AcademicClassRepositoryInterface::class, function ($app) {
            return new AcademicClassRepository(new AcademicClass());
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
