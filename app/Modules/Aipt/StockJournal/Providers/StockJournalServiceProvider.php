<?php

namespace Modules\Aipt\StockJournal\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\StockJournal\Contracts\StockJournalRepositoryInterface;
use Modules\Aipt\StockJournal\Repositories\StockJournalRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockJournal\Contracts\StockJournalServiceInterface;
use Modules\Aipt\StockJournal\Services\StockJournalService;
use Modules\Aipt\StockJournal\Models\StockJournal;

class StockJournalServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StockJournalRepositoryInterface::class, function ($app) {
            return new StockJournalRepository(new StockJournal());
        });
        $this->app->singleton(StockJournalServiceInterface::class, StockJournalService::class);
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
