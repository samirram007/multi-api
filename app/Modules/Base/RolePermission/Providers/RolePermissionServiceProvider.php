<?php

namespace Modules\Base\RolePermission\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\RolePermission\Contracts\RolePermissionServiceInterface;
use Modules\Base\RolePermission\Services\RolePermissionService;
use Modules\Base\RolePermission\Contracts\RolePermissionRepositoryInterface;
use Modules\Base\RolePermission\Repositories\RolePermissionRepository;
use Modules\Base\RolePermission\Models\RolePermission;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RolePermissionRepositoryInterface::class, function ($app) {
            return new RolePermissionRepository(new RolePermission());
        });
        $this->app->bind(RolePermissionServiceInterface::class, RolePermissionService::class);
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
