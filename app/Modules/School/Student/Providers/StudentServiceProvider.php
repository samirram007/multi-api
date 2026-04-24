<?php

namespace App\Modules\School\Student\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\School\Student\Contracts\StudentServiceInterface;
use App\Modules\School\Student\Services\StudentService;

class StudentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentService::class);
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
        //echo "Loading Student Migrations from: " . __DIR__ . '/../Database/Migrations' . "\n";
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
