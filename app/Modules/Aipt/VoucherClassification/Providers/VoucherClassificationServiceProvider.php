<?php

namespace Modules\Aipt\VoucherClassification\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherClassification\Contracts\VoucherClassificationRepositoryInterface;
use Modules\Aipt\VoucherClassification\Repositories\VoucherClassificationRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherClassification\Contracts\VoucherClassificationServiceInterface;
use Modules\Aipt\VoucherClassification\Services\VoucherClassificationService;

class VoucherClassificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherClassificationRepositoryInterface::class, VoucherClassificationRepository::class);
        $this->app->singleton(VoucherClassificationServiceInterface::class, VoucherClassificationService::class);
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
