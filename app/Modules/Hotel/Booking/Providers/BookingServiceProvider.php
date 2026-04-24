<?php
namespace App\Modules\Hotel\Booking\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Hotel\Booking\Contracts\BookingServiceInterface;
use App\Modules\Hotel\Booking\Services\BookingService;

class BookingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookingServiceInterface::class, BookingService::class);

        $this->app->singleton('bookings', function ($app) {
            return $app->make(BookingServiceInterface::class);
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
