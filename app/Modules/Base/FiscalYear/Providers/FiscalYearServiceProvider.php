<?php

namespace App\Modules\Base\FiscalYear\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Base\FiscalYear\Contracts\FiscalYearServiceInterface;
use App\Modules\Base\FiscalYear\Services\FiscalYearService;

class FiscalYearServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FiscalYearServiceInterface::class, FiscalYearService::class);
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
