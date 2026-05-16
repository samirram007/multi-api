<?php

namespace Modules\Base\UserRole\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\UserRole\Contracts\UserRoleServiceInterface;
use Modules\Base\UserRole\Services\UserRoleService;
use Modules\Base\UserRole\Contracts\UserRoleRepositoryInterface;
use Modules\Base\UserRole\Repositories\UserRoleRepository;
use Modules\Base\UserRole\Models\UserRole;

class UserRoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRoleRepositoryInterface::class, function ($app) {
            return new UserRoleRepository(new UserRole());
        });
        $this->app->bind(UserRoleServiceInterface::class, UserRoleService::class);
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
