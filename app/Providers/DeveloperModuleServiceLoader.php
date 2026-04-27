<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DeveloperModuleServiceLoader extends ServiceProvider
{

    public function register(): void
    {
        $modulePath = app_path('Modules/Developer');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "Modules\\Developer\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
