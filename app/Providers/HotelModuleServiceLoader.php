<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HotelModuleServiceLoader extends ServiceProvider
{
    public function register(): void
    {
        $modulePath = app_path('Modules/Hotel');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "App\\Modules\\Hotel\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
