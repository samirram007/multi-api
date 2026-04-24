<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentModuleServiceLoader extends ServiceProvider
{

    public function register(): void
    {
        $modulePath = app_path('Modules/Document');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "App\\Modules\\Document\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
