<?php

namespace App\Modules\Worker\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Worker\Contracts\WorkerServiceInterface;
use App\Modules\Worker\Services\WorkerService;

class WorkerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WorkerServiceInterface::class, WorkerService::class);

        $this->app->singleton('workers', function ($app) {
            return $app->make(WorkerServiceInterface::class);
        });


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
