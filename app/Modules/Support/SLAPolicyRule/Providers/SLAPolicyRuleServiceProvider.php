<?php

namespace App\Modules\Support\SLAPolicyRule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Support\SLAPolicyRule\Contracts\SLAPolicyRuleServiceInterface;
use App\Modules\Support\SLAPolicyRule\Services\SLAPolicyRuleService;

class SLAPolicyRuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SLAPolicyRuleServiceInterface::class, SLAPolicyRuleService::class);
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
