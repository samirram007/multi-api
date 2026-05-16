<?php

namespace Modules\Base\Role\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\Role\Contracts\RoleServiceInterface;
use Modules\Base\Role\Services\RoleService;
use Modules\Base\Role\Contracts\RoleRepositoryInterface;
use Modules\Base\Role\Repositories\RoleRepository;
use Modules\Base\Role\Models\Role;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RoleRepositoryInterface::class, function ($app) {
            return new RoleRepository(new Role());
        });
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
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
