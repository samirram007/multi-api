<?php

namespace Modules\Aipt\VoucherReference\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherReference\Contracts\VoucherReferenceServiceInterface;
use Modules\Aipt\VoucherReference\Services\VoucherReferenceService;

class VoucherReferenceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherReferenceServiceInterface::class, VoucherReferenceService::class);
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
