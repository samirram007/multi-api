<?php
namespace Modules\School\IncomeGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\IncomeGroup\Contracts\IncomeGroupServiceInterface;
use Modules\School\IncomeGroup\Services\IncomeGroupService;

class IncomeGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(IncomeGroupServiceInterface::class, IncomeGroupService::class);

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
