<?php

namespace Modules\Base\Currency\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\Currency\Contracts\CurrencyServiceInterface;
use Modules\Base\Currency\Services\CurrencyService;
use Modules\Base\Currency\Contracts\CurrencyRepositoryInterface;
use Modules\Base\Currency\Repositories\CurrencyRepository;
use Modules\Base\Currency\Models\Currency;

class CurrencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CurrencyRepositoryInterface::class, function ($app) {
            return new CurrencyRepository(new Currency());
        });
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
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
