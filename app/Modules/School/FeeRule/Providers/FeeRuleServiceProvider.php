<?php
namespace Modules\School\FeeRule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\FeeRule\Contracts\FeeRuleServiceInterface;
use Modules\School\FeeRule\Services\FeeRuleService;

class FeeRuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FeeRuleServiceInterface::class, FeeRuleService::class);

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
