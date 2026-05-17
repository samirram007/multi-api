<?php

namespace Modules\Aipt\HsnSacCode\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeRepositoryInterface;
use Modules\Aipt\HsnSacCode\Repositories\HsnSacCodeRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeServiceInterface;
use Modules\Aipt\HsnSacCode\Services\HsnSacCodeService;
use Modules\Aipt\HsnSacCode\Models\HsnSacCode;

class HsnSacCodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(HsnSacCodeRepositoryInterface::class, function ($app) {
            return new HsnSacCodeRepository(new HsnSacCode());
        });
        $this->app->singleton(HsnSacCodeServiceInterface::class, HsnSacCodeService::class);
        
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
