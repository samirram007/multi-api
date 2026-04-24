<?php
namespace App\Modules\School\FeeItemMonth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeItemMonth\Contracts\FeeItemMonthServiceInterface;
use App\Modules\School\FeeItemMonth\Services\FeeItemMonthService;

class FeeItemMonthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FeeItemMonthServiceInterface::class, FeeItemMonthService::class);

        $this->app->singleton('fee_item_months', function ($app) {
            return $app->make(FeeItemMonthServiceInterface::class);
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
