<?php

namespace Modules\Aipt\StockJournalEntry\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockJournalEntry\Contracts\StockJournalEntryServiceInterface;
use Modules\Aipt\StockJournalEntry\Services\StockJournalEntryService;

class StockJournalEntryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockJournalEntryServiceInterface::class, StockJournalEntryService::class);
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
