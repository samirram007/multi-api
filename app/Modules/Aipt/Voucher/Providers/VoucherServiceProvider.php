<?php

namespace Modules\Aipt\Voucher\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\Voucher\Contracts\VoucherRepositoryInterface;
use Modules\Aipt\Voucher\Repositories\VoucherRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Voucher\Contracts\VoucherServiceInterface;
use Modules\Aipt\Voucher\Services\VoucherService;

class VoucherServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherRepositoryInterface::class, VoucherRepository::class);
        $this->app->singleton(VoucherServiceInterface::class, VoucherService::class);
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
