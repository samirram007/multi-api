<?php

namespace App\Modules\Base\Address\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Base\Address\Contracts\AddressServiceInterface;
use App\Modules\Base\Address\Services\AddressService;

class AddressServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AddressServiceInterface::class, AddressService::class);
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
