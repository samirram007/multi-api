<?php

namespace Modules\Base\Country\Providers;

use Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Modules\Base\Country\Repositories\CountryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\Country\Contracts\CountryServiceInterface;
use Modules\Base\Country\Services\CountryService;
use Modules\Base\Country\Models\Country;

class CountryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, function ($app) {
            return new CountryRepository(new Country());
        });
        $this->app->singleton(CountryServiceInterface::class, CountryService::class);

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
