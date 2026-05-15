<?php
namespace Modules\School\FeeReceipt\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\FeeReceipt\Contracts\FeeReceiptServiceInterface;
use Modules\School\FeeReceipt\Services\FeeReceiptService;

class FeeReceiptServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeReceiptServiceInterface::class, FeeReceiptService::class);




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
