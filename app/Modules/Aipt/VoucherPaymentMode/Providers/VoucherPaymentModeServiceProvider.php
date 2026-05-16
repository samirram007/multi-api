<?php

namespace Modules\Aipt\VoucherPaymentMode\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherPaymentMode\Contracts\VoucherPaymentModeRepositoryInterface;
use Modules\Aipt\VoucherPaymentMode\Repositories\VoucherPaymentModeRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherPaymentMode\Contracts\VoucherPaymentModeServiceInterface;
use Modules\Aipt\VoucherPaymentMode\Services\VoucherPaymentModeService;

class VoucherPaymentModeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherPaymentModeRepositoryInterface::class, VoucherPaymentModeRepository::class);
        $this->app->singleton(VoucherPaymentModeServiceInterface::class, VoucherPaymentModeService::class);
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
