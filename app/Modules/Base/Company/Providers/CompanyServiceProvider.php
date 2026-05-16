<?php

namespace Modules\Base\Company\Providers;

use Modules\Base\Company\Contracts\CompanyRepositoryInterface;
use Modules\Base\Company\Repositories\CompanyRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\Company\Contracts\CompanyServiceInterface;
use Modules\Base\Company\Services\CompanyService;
use Modules\Base\Company\Models\Company;

class CompanyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CompanyRepositoryInterface::class, function ($app) {
            return new CompanyRepository(new Company());
        });
        $this->app->singleton(CompanyServiceInterface::class, CompanyService::class);
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
