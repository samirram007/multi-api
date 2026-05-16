<?php

namespace Modules\Aipt\StockJournalStorageUnitEntry\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryRepositoryInterface;
use Modules\Aipt\StockJournalStorageUnitEntry\Repositories\StockJournalStorageUnitEntryRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryServiceInterface;
use Modules\Aipt\StockJournalStorageUnitEntry\Services\StockJournalStorageUnitEntryService;

class StockJournalStorageUnitEntryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockJournalStorageUnitEntryRepositoryInterface::class, StockJournalStorageUnitEntryRepository::class);
        $this->app->singleton(StockJournalStorageUnitEntryServiceInterface::class, StockJournalStorageUnitEntryService::class);
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
