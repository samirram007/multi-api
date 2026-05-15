<?php
namespace Modules\School\FeeFeeReceipt\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\FeeFeeReceipt\Contracts\FeeFeeReceiptServiceInterface;
use Modules\School\FeeFeeReceipt\Services\FeeFeeReceiptService;

class FeeFeeReceiptServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeFeeReceiptServiceInterface::class, FeeFeeReceiptService::class);




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
