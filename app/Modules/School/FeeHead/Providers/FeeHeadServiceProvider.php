<?php
namespace App\Modules\School\FeeHead\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeHead\Contracts\FeeHeadServiceInterface;
use App\Modules\School\FeeHead\Services\FeeHeadService;

class FeeHeadServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FeeHeadServiceInterface::class, FeeHeadService::class);

        $this->app->singleton('fee_heads', function ($app) {
            return $app->make(FeeHeadServiceInterface::class);
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
