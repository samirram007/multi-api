<?php

namespace Modules\Aipt\AccountNature\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\AccountNature\Contracts\AccountNatureRepositoryInterface;
use Modules\Aipt\AccountNature\Models\AccountNature;
use Modules\Aipt\AccountNature\Repositories\AccountNatureRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\AccountNature\Contracts\AccountNatureServiceInterface;
use Modules\Aipt\AccountNature\Services\AccountNatureService;

class AccountNatureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AccountNatureRepositoryInterface::class, function ($app) {
            return new AccountNatureRepository(new AccountNature());
        });
        $this->app->singleton(AccountNatureServiceInterface::class, AccountNatureService::class);

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
