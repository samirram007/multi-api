<?php

namespace Modules\Aipt\Language\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\Language\Contracts\LanguageRepositoryInterface;
use Modules\Aipt\Language\Repositories\LanguageRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\Language\Contracts\LanguageServiceInterface;
use Modules\Aipt\Language\Services\LanguageService;

class LanguageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->singleton(LanguageServiceInterface::class, LanguageService::class);
        
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
