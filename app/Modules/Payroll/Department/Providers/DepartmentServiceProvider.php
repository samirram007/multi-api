<?php
namespace App\Modules\Payroll\Department\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Payroll\Department\Contracts\DepartmentServiceInterface;
use App\Modules\Payroll\Department\Services\DepartmentService;

class DepartmentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DepartmentServiceInterface::class, DepartmentService::class);

        $this->app->singleton('departments', function ($app) {
            return $app->make(DepartmentServiceInterface::class);
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
