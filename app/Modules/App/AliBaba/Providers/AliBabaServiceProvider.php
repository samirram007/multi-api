<?php
namespace Modules\App\AliBaba\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\App\AliBaba\Contracts\AliBabaServiceInterface;
use Modules\App\AliBaba\Services\AliBabaService;
use Modules\App\AliBaba\Contracts\AliBabaRepositoryInterface;
use Modules\App\AliBaba\Repositories\AliBabaRepository;
use Modules\App\AliBaba\Models\AliBaba;

class AliBabaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AliBabaRepositoryInterface::class, function ($app) {
            return new AliBabaRepository(new AliBaba());
        });
        $this->app->singleton(AliBabaServiceInterface::class, AliBabaService::class);
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
