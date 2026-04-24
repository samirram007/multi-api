<?php

namespace App\Modules\Support\SLAPolicy\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Support\SLAPolicy\Contracts\SLAPolicyServiceInterface;
use App\Modules\Support\SLAPolicy\Services\SLAPolicyService;

class SLAPolicyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SLAPolicyServiceInterface::class, SLAPolicyService::class);
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
