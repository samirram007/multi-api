<?php

namespace Modules\Aipt\StorageUnit\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StorageUnit\Contracts\StorageUnitRepositoryInterface;
use Modules\Aipt\StorageUnit\Repositories\StorageUnitRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StorageUnit\Contracts\StorageUnitServiceInterface;
use Modules\Aipt\StorageUnit\Services\StorageUnitService;

class StorageUnitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StorageUnitRepositoryInterface::class, StorageUnitRepository::class);
        $this->app->singleton(StorageUnitServiceInterface::class, StorageUnitService::class);
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
