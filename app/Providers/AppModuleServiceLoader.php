<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function Illuminate\Log\log;

class AppModuleServiceLoader extends ServiceProvider
{

    public function register(): void
    {
        $modulePath = app_path('Modules/App');
        $directories = glob("{$modulePath}/*", GLOB_ONLYDIR);

        foreach ($directories as $modulePath) {
            $module = basename($modulePath);
            $providerClass = "Modules\\App\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
