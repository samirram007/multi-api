<?php
namespace Modules\School\Book\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\School\Book\Contracts\BookServiceInterface;
use Modules\School\Book\Services\BookService;
use Modules\School\Book\Contracts\BookRepositoryInterface;
use Modules\School\Book\Repositories\BookRepository;
use Modules\School\Book\Models\Book;

class BookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BookServiceInterface::class, BookService::class);
        $this->app->singleton(BookRepositoryInterface::class, function ($app) {
            return new BookRepository(new Book());
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
