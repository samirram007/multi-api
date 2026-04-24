<?php
namespace App\Modules\Hotel\Amenities\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Hotel\Amenities\Contracts\AmenitiesServiceInterface;
use App\Modules\Hotel\Amenities\Services\AmenitiesService;

class AmenitiesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AmenitiesServiceInterface::class, AmenitiesService::class);

        $this->app->singleton('amenities', function ($app) {
            return $app->make(AmenitiesServiceInterface::class);
        });


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
