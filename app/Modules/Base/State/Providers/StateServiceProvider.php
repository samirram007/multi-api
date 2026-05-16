<?php

namespace Modules\Base\State\Providers;

use Modules\Base\State\Contracts\StateRepositoryInterface;
use Modules\Base\State\Repositories\StateRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\State\Contracts\StateServiceInterface;
use Modules\Base\State\Services\StateService;
use Modules\Base\State\Models\State;

class StateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StateRepositoryInterface::class, function ($app) {
            return new StateRepository(new State());
        });
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
