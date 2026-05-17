<?php

namespace Modules\Aipt\VoucherParty\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherParty\Contracts\VoucherPartyRepositoryInterface;
use Modules\Aipt\VoucherParty\Repositories\VoucherPartyRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherParty\Contracts\VoucherPartyServiceInterface;
use Modules\Aipt\VoucherParty\Services\VoucherPartyService;
use Modules\Aipt\VoucherParty\Models\VoucherParty;

class VoucherPartyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherPartyRepositoryInterface::class, function ($app) {
            return new VoucherPartyRepository(new VoucherParty());
        });
        $this->app->singleton(VoucherPartyServiceInterface::class, VoucherPartyService::class);
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
