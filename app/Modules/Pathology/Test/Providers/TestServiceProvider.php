<?php
namespace App\Modules\Pathology\Test\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Pathology\Test\Contracts\TestServiceInterface;
use App\Modules\Pathology\Test\Services\TestService;

class TestServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TestServiceInterface::class, TestService::class);

        $this->app->singleton('tests', function ($app) {
            return $app->make(TestServiceInterface::class);
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
