<?php

namespace Modules\Aipt\VoucherNo\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherNo\Contracts\VoucherNoServiceInterface;
use Modules\Aipt\VoucherNo\Services\VoucherNoService;

class VoucherNoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherNoServiceInterface::class, VoucherNoService::class);
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
