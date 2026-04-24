<?php
namespace App\Modules\Maintenance\Backup\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Maintenance\Backup\Contracts\BackupServiceInterface;
use App\Modules\Maintenance\Backup\Services\BackupService;

class BackupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BackupServiceInterface::class, BackupService::class);

        $this->app->singleton('backups', function ($app) {
            return $app->make(BackupServiceInterface::class);
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
