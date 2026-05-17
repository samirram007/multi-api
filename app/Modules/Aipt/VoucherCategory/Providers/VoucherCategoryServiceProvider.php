<?php

namespace Modules\Aipt\VoucherCategory\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Aipt\VoucherCategory\Contracts\VoucherCategoryRepositoryInterface;
use Modules\Aipt\VoucherCategory\Repositories\VoucherCategoryRepository;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherCategory\Contracts\VoucherCategoryServiceInterface;
use Modules\Aipt\VoucherCategory\Services\VoucherCategoryService;
use Modules\Aipt\VoucherCategory\Models\VoucherCategory;

class VoucherCategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VoucherCategoryRepositoryInterface::class, function ($app) {
            return new VoucherCategoryRepository(new VoucherCategory());
        });
        $this->app->singleton(VoucherCategoryServiceInterface::class, VoucherCategoryService::class);
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
