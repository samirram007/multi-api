<?php
namespace Modules\School\Admission\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Admission\Contracts\AdmissionServiceInterface;
use Modules\School\Admission\Services\AdmissionService;
use Modules\School\Admission\Contracts\AdmissionRepositoryInterface;
use Modules\School\Admission\Repositories\AdmissionRepository;
use Modules\School\Admission\Models\Admission;

class AdmissionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AdmissionServiceInterface::class, AdmissionService::class);
        $this->app->singleton(AdmissionRepositoryInterface::class, function ($app) {
            return new AdmissionRepository(new Admission());
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
