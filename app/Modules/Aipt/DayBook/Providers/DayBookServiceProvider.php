<?php

namespace Modules\Aipt\DayBook\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\DayBook\Contracts\DayBookRepositoryInterface;
use Modules\Aipt\DayBook\Repositories\DayBookRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\DayBook\Contracts\DayBookServiceInterface;
use Modules\Aipt\DayBook\Services\DayBookService;

class DayBookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(DayBookRepositoryInterface::class, DayBookRepository::class);
        $this->app->singleton(DayBookServiceInterface::class, DayBookService::class);
        
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
