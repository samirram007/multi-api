<?php
namespace Modules\App\TenantAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\App\TenantAuth\Contracts\TenantAuthServiceInterface;
use Modules\App\TenantAuth\Services\TenantAuthService;

class TenantAuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TenantAuthServiceInterface::class, TenantAuthService::class);




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
