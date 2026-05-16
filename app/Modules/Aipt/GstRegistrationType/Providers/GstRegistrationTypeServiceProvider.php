<?php

namespace Modules\Aipt\GstRegistrationType\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeRepositoryInterface;
use Modules\Aipt\GstRegistrationType\Repositories\GstRegistrationTypeRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeServiceInterface;
use Modules\Aipt\GstRegistrationType\Services\GstRegistrationTypeService;

class GstRegistrationTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GstRegistrationTypeRepositoryInterface::class, GstRegistrationTypeRepository::class);
        $this->app->singleton(GstRegistrationTypeServiceInterface::class, GstRegistrationTypeService::class);
        
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
