<?php

namespace Modules\Base\FiscalYear\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\FiscalYear\Contracts\FiscalYearServiceInterface;
use Modules\Base\FiscalYear\Services\FiscalYearService;
use Modules\Base\FiscalYear\Contracts\FiscalYearRepositoryInterface;
use Modules\Base\FiscalYear\Repositories\FiscalYearRepository;
use Modules\Base\FiscalYear\Models\FiscalYear;

class FiscalYearServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FiscalYearRepositoryInterface::class, function ($app) {
            return new FiscalYearRepository(new FiscalYear());
        });
        $this->app->singleton(FiscalYearServiceInterface::class, FiscalYearService::class);
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
