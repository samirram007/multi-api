<?php

namespace Modules\Aipt\VoucherDispatchDetail\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherDispatchDetail\Contracts\VoucherDispatchDetailRepositoryInterface;
use Modules\Aipt\VoucherDispatchDetail\Repositories\VoucherDispatchDetailRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherDispatchDetail\Contracts\VoucherDispatchDetailServiceInterface;
use Modules\Aipt\VoucherDispatchDetail\Services\VoucherDispatchDetailService;
use Modules\Aipt\VoucherDispatchDetail\Models\VoucherDispatchDetail;

class VoucherDispatchDetailServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherDispatchDetailRepositoryInterface::class, function ($app) {
            return new VoucherDispatchDetailRepository(new VoucherDispatchDetail());
        });
        $this->app->singleton(VoucherDispatchDetailServiceInterface::class, VoucherDispatchDetailService::class);
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
