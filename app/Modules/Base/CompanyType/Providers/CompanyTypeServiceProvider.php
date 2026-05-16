<?php

namespace Modules\Base\CompanyType\Providers;

use Modules\Base\CompanyType\Contracts\CompanyTypeRepositoryInterface;
use Modules\Base\CompanyType\Repositories\CompanyTypeRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\CompanyType\Contracts\CompanyTypeServiceInterface;
use Modules\Base\CompanyType\Services\CompanyTypeService;
use Modules\Base\CompanyType\Models\CompanyType;

class CompanyTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CompanyTypeRepositoryInterface::class, function ($app) {
            return new CompanyTypeRepository(new CompanyType());
        });
        $this->app->singleton(CompanyTypeServiceInterface::class, CompanyTypeService::class);
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
