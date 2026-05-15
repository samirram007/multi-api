<?php
namespace Modules\School\BookModule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\BookModule\Contracts\BookModuleServiceInterface;
use Modules\School\BookModule\Services\BookModuleService;

class BookModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BookModuleServiceInterface::class, BookModuleService::class);




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
