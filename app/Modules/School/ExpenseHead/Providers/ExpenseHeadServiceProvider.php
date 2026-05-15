<?php
namespace Modules\School\ExpenseHead\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\ExpenseHead\Contracts\ExpenseHeadServiceInterface;
use Modules\School\ExpenseHead\Services\ExpenseHeadService;

class ExpenseHeadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExpenseHeadServiceInterface::class, ExpenseHeadService::class);

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
