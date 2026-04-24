<?php

namespace App\Modules\Base\State\Providers;

use App\Modules\Base\State\Contracts\StateRepositoryInterface;
use App\Modules\Base\State\Repositories\StateRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Base\State\Contracts\StateServiceInterface;
use App\Modules\Base\State\Services\StateService;

class StateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->singleton(StateServiceInterface::class, StateService::class);

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
