<?php

namespace App\Modules\WorkerMod\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\WorkerMod\Contracts\WorkerModServiceInterface;
use App\Modules\WorkerMod\Services\WorkerModService;

class WorkerModServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WorkerModServiceInterface::class, WorkerModService::class);

        $this->app->singleton('worker_mods', function ($app) {
            return $app->make(WorkerModServiceInterface::class);
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
