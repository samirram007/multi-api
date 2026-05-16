<?php

namespace Modules\Aipt\VoucherEntry\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherEntry\Contracts\VoucherEntryRepositoryInterface;
use Modules\Aipt\VoucherEntry\Repositories\VoucherEntryRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherEntry\Contracts\VoucherEntryServiceInterface;
use Modules\Aipt\VoucherEntry\Services\VoucherEntryService;

class VoucherEntryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherEntryRepositoryInterface::class, VoucherEntryRepository::class);
        $this->app->singleton(VoucherEntryServiceInterface::class, VoucherEntryService::class);
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
