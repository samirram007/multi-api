<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HospitalModuleServiceLoader extends ServiceProvider
{

    public function register(): void
    {
        $modulePath = app_path('Modules/Hospital');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "App\\Modules\\Hospital\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
