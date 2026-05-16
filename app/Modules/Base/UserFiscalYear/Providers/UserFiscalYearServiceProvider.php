<?php

namespace Modules\Base\UserFiscalYear\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearServiceInterface;
use Modules\Base\UserFiscalYear\Services\UserFiscalYearService;
use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearRepositoryInterface;
use Modules\Base\UserFiscalYear\Repositories\UserFiscalYearRepository;
use Modules\Base\UserFiscalYear\Models\UserFiscalYear;

class UserFiscalYearServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserFiscalYearRepositoryInterface::class, function ($app) {
            return new UserFiscalYearRepository(new UserFiscalYear());
        });
        $this->app->bind(UserFiscalYearServiceInterface::class, UserFiscalYearService::class);
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
