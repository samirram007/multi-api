<?php

namespace Modules\Document\Document\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Document\Document\Contracts\DocumentServiceInterface;
use Modules\Document\Document\Services\DocumentService;
use Modules\Document\Document\Contracts\DocumentRepositoryInterface;
use Modules\Document\Document\Repositories\DocumentRepository;
use Modules\Document\Document\Models\Document;

class DocumentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(DocumentRepositoryInterface::class, function ($app) {
            return new DocumentRepository(new Document());
        });
        $this->app->singleton(DocumentServiceInterface::class, DocumentService::class);
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
