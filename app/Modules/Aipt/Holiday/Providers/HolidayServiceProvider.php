<?php

namespace Modules\Aipt\Holiday\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\Holiday\Contracts\HolidayRepositoryInterface;
use Modules\Aipt\Holiday\Repositories\HolidayRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Holiday\Contracts\HolidayServiceInterface;
use Modules\Aipt\Holiday\Services\HolidayService;
use Modules\Aipt\Holiday\Models\Holiday;

class HolidayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(HolidayRepositoryInterface::class, function ($app) {
            return new HolidayRepository(new Holiday());
        });
        $this->app->singleton(HolidayServiceInterface::class, HolidayService::class);
       
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
