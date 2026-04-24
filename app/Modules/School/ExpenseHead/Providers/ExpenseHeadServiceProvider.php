<?php
namespace App\Modules\School\ExpenseHead\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\ExpenseHead\Contracts\ExpenseHeadServiceInterface;
use App\Modules\School\ExpenseHead\Services\ExpenseHeadService;

class ExpenseHeadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ExpenseHeadServiceInterface::class, ExpenseHeadService::class);

        $this->app->singleton('expense_heads', function ($app) {
            return $app->make(ExpenseHeadServiceInterface::class);
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
