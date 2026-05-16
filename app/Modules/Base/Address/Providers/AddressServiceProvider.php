<?php

namespace Modules\Base\Address\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Base\Address\Contracts\AddressServiceInterface;
use Modules\Base\Address\Services\AddressService;
use Modules\Base\Address\Contracts\AddressRepositoryInterface;
use Modules\Base\Address\Repositories\AddressRepository;
use Modules\Base\Address\Models\Address;

class AddressServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(AddressRepositoryInterface::class, function ($app) {
            return new AddressRepository(new Address());
        });
        $this->app->singleton(AddressServiceInterface::class, AddressService::class);
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
