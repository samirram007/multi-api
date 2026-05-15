<?php
namespace Modules\School\Room\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Room\Contracts\RoomServiceInterface;
use Modules\School\Room\Services\RoomService;

class RoomServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(RoomServiceInterface::class, RoomService::class);




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
