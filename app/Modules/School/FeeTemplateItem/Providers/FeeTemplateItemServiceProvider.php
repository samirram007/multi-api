<?php
namespace Modules\School\FeeTemplateItem\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\FeeTemplateItem\Contracts\FeeTemplateItemServiceInterface;
use Modules\School\FeeTemplateItem\Services\FeeTemplateItemService;

class FeeTemplateItemServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeTemplateItemServiceInterface::class, FeeTemplateItemService::class);




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
