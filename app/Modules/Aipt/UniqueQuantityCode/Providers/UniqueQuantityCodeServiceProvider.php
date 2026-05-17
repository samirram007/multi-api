<?php

namespace Modules\Aipt\UniqueQuantityCode\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\UniqueQuantityCode\Contracts\UniqueQuantityCodeRepositoryInterface;
use Modules\Aipt\UniqueQuantityCode\Repositories\UniqueQuantityCodeRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\UniqueQuantityCode\Contracts\UniqueQuantityCodeServiceInterface;
use Modules\Aipt\UniqueQuantityCode\Services\UniqueQuantityCodeService;
use Modules\Aipt\UniqueQuantityCode\Models\UniqueQuantityCode;

class UniqueQuantityCodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UniqueQuantityCodeRepositoryInterface::class, function ($app) {
            return new UniqueQuantityCodeRepository(new UniqueQuantityCode());
        });
        $this->app->singleton(UniqueQuantityCodeServiceInterface::class, UniqueQuantityCodeService::class);
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
