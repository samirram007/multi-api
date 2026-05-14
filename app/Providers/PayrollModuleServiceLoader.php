<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PayrollModuleServiceLoader extends ServiceProvider
{
    public function register(): void
    {
        $modulePath = base_path('app/Modules/Payroll');
        $modulePath = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $modulePath);
        
        $directories = glob($modulePath . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);

        foreach ($directories as $dir) {
            $module = basename($dir);
            $providerClass = "Modules\\Payroll\\{$module}\\Providers\\{$module}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
