<?php
namespace Modules\App\TenantUser\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\App\TenantUser\Contracts\TenantUserServiceInterface;
use Modules\App\TenantUser\Services\TenantUserService;

class TenantUserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TenantUserServiceInterface::class, TenantUserService::class);




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
