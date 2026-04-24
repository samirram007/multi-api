<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PathologyModuleServiceLoader extends ServiceProvider
{
    public function register(): void
    {
        $modulePath = app_path('Modules/Pathology');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "App\\Modules\\Pathology\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
