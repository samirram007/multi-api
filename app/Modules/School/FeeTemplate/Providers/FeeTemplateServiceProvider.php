<?php
namespace App\Modules\School\FeeTemplate\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeTemplate\Contracts\FeeTemplateServiceInterface;
use App\Modules\School\FeeTemplate\Services\FeeTemplateService;

class FeeTemplateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FeeTemplateServiceInterface::class, FeeTemplateService::class);

        $this->app->singleton('fee_templates', function ($app) {
            return $app->make(FeeTemplateServiceInterface::class);
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
