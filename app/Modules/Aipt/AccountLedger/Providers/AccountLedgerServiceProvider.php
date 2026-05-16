<?php

namespace Modules\Aipt\AccountLedger\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\AccountLedger\Contracts\AccountLedgerRepositoryInterface;
use Modules\Aipt\AccountLedger\Repositories\AccountLedgerRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\AccountLedger\Contracts\AccountLedgerServiceInterface;
use Modules\Aipt\AccountLedger\Services\AccountLedgerService;

class AccountLedgerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AccountLedgerRepositoryInterface::class, AccountLedgerRepository::class);
        $this->app->singleton(AccountLedgerServiceInterface::class, AccountLedgerService::class);
        
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
