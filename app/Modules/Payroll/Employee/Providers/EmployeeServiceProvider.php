<?php
namespace App\Modules\Payroll\Employee\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Payroll\Employee\Contracts\EmployeeServiceInterface;
use App\Modules\Payroll\Employee\Services\EmployeeService;

class EmployeeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EmployeeServiceInterface::class, EmployeeService::class);

        $this->app->singleton('employees', function ($app) {
            return $app->make(EmployeeServiceInterface::class);
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
