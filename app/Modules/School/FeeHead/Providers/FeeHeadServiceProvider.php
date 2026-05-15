<?php
namespace Modules\School\FeeHead\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\FeeHead\Contracts\FeeHeadServiceInterface;
use Modules\School\FeeHead\Services\FeeHeadService;

class FeeHeadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeHeadServiceInterface::class, FeeHeadService::class);

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
