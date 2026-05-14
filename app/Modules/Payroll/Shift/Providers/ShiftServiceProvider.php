<?php

namespace Modules\Payroll\Shift\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Payroll\Shift\Contracts\ShiftServiceInterface;
use Modules\Payroll\Shift\Services\ShiftService;

class ShiftServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ShiftServiceInterface::class, ShiftService::class);
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
