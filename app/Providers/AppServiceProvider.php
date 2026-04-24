<?php

namespace App\Providers;

use App\Support\Contracts\BaseRepositoryInterface;
use App\Support\Contracts\CachedRepositoryInterface;
use App\Support\Repositories\BaseRepository;
use App\Support\Repositories\CachedRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CachedRepositoryInterface::class, CachedRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ??


    }
}
