<?php
namespace App\Modules\School\ExpenseGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExpenseGroup\Contracts\ExpenseGroupServiceInterface;
use App\Modules\School\ExpenseGroup\Services\ExpenseGroupService;

class ExpenseGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExpenseGroupServiceInterface::class, ExpenseGroupService::class);

        $this->app->singleton('expense_groups', function ($app) {
            return $app->make(ExpenseGroupServiceInterface::class);
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
