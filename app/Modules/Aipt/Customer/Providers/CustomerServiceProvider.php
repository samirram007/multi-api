<?php

namespace Modules\Aipt\Customer\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Customer\Contracts\CustomerServiceInterface;
use Modules\Aipt\Customer\Services\CustomerService;

class CustomerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
       
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
