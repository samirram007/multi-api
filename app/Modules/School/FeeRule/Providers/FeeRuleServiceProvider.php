<?php
namespace App\Modules\School\FeeRule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeRule\Contracts\FeeRuleServiceInterface;
use App\Modules\School\FeeRule\Services\FeeRuleService;

class FeeRuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FeeRuleServiceInterface::class, FeeRuleService::class);

        $this->app->singleton('fee_rules', function ($app) {
            return $app->make(FeeRuleServiceInterface::class);
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
