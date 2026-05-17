<?php

namespace Modules\Aipt\VoucherType\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherType\Contracts\VoucherTypeRepositoryInterface;
use Modules\Aipt\VoucherType\Repositories\VoucherTypeRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherType\Contracts\VoucherTypeServiceInterface;
use Modules\Aipt\VoucherType\Services\VoucherTypeService;
use Modules\Aipt\VoucherType\Models\VoucherType;

class VoucherTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherTypeRepositoryInterface::class, function ($app) {
            return new VoucherTypeRepository(new VoucherType());
        });
        $this->app->singleton(VoucherTypeServiceInterface::class, VoucherTypeService::class);
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
