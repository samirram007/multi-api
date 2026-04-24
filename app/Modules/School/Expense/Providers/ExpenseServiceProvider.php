<?php
namespace App\Modules\School\Expense\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Expense\Contracts\ExpenseServiceInterface;
use App\Modules\School\Expense\Services\ExpenseService;

class ExpenseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExpenseServiceInterface::class, ExpenseService::class);

        $this->app->singleton('expenses', function ($app) {
            return $app->make(ExpenseServiceInterface::class);
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
