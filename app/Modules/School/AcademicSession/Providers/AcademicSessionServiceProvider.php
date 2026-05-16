<?php
namespace Modules\School\AcademicSession\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\AcademicSession\Contracts\AcademicSessionServiceInterface;
use Modules\School\AcademicSession\Services\AcademicSessionService;
use Modules\School\AcademicSession\Contracts\AcademicSessionRepositoryInterface;
use Modules\School\AcademicSession\Repositories\AcademicSessionRepository;
use Modules\School\AcademicSession\Models\AcademicSession;

class AcademicSessionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AcademicSessionServiceInterface::class, AcademicSessionService::class);
        $this->app->singleton(AcademicSessionRepositoryInterface::class, function ($app) {
            return new AcademicSessionRepository(new AcademicSession());
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
