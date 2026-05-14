<?php

namespace Modules\Payroll\SalaryComponent\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Payroll\SalaryComponent\Contracts\SalaryComponentServiceInterface;
use Modules\Payroll\SalaryComponent\Services\SalaryComponentService;

class SalaryComponentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SalaryComponentServiceInterface::class, SalaryComponentService::class);
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
