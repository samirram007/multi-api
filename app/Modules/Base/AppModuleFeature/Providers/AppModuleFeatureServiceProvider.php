<?php

namespace Modules\Base\AppModuleFeature\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureServiceInterface;
use Modules\Base\AppModuleFeature\Services\AppModuleFeatureService;
use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureRepositoryInterface;
use Modules\Base\AppModuleFeature\Repositories\AppModuleFeatureRepository;
use Modules\Base\AppModuleFeature\Models\AppModuleFeature;

class AppModuleFeatureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AppModuleFeatureRepositoryInterface::class, function ($app) {
            return new AppModuleFeatureRepository(new AppModuleFeature());
        });
        $this->app->bind(AppModuleFeatureServiceInterface::class, AppModuleFeatureService::class);
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
