<?php
namespace Modules\App\Tenant\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\App\Tenant\Contracts\TenantServiceInterface;
use Modules\App\Tenant\Services\TenantService;
use Modules\App\Tenant\Services\TenantManager;

class TenantServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TenantServiceInterface::class, TenantService::class);



        $this->app->singleton(TenantManager::class, function ($app) {
            return new TenantManager();
        });
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
