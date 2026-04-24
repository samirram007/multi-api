<?php

namespace App\Modules\School\Teacher\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Teacher\Contracts\TeacherServiceInterface;
use App\Modules\School\Teacher\Services\TeacherService;

class TeacherServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TeacherServiceInterface::class, TeacherService::class);

        $this->app->singleton('teachers', function ($app) {
            return $app->make(TeacherServiceInterface::class);
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
