<?php

namespace Modules\Aipt\AccountGroup\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\AccountGroup\Contracts\AccountGroupRepositoryInterface;
use Modules\Aipt\AccountGroup\Repositories\AccountGroupRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\AccountGroup\Contracts\AccountGroupServiceInterface;
use Modules\Aipt\AccountGroup\Services\AccountGroupService;

class AccountGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AccountGroupRepositoryInterface::class, AccountGroupRepository::class);
        $this->app->singleton(AccountGroupServiceInterface::class, AccountGroupService::class);
        
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
