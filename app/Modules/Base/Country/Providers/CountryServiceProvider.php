<?php

namespace App\Modules\Base\Country\Providers;

use App\Modules\Base\Country\Contracts\CountryRepositoryInterface;
use App\Modules\Base\Country\Repositories\CountryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Base\Country\Contracts\CountryServiceInterface;
use App\Modules\Base\Country\Services\CountryService;

class CountryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
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
