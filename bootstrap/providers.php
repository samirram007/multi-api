<?php

use App\Providers\AiptModuleServiceLoader;
use App\Providers\AppModuleServiceLoader;
use App\Providers\AppServiceProvider;
use App\Providers\AuditServiceProvider;
use App\Providers\BaseModuleServiceLoader;
use App\Providers\DeveloperModuleServiceLoader;
use App\Providers\DocumentModuleServiceLoader;
use App\Providers\HospitalModuleServiceLoader;
use App\Providers\MaintenanceModuleServiceLoader;
use App\Providers\SchoolModuleServiceLoader;
use App\Providers\PathologyModuleServiceLoader;
use App\Providers\HotelModuleServiceLoader;
use App\Providers\RestaurantModuleServiceLoader;
use App\Providers\PayrollModuleServiceLoader;


$providers = [
    AppServiceProvider::class,
    AppModuleServiceLoader::class,
    AuditServiceProvider::class,
    DeveloperModuleServiceLoader::class,
    BaseModuleServiceLoader::class,
    DocumentModuleServiceLoader::class,
    MaintenanceModuleServiceLoader::class,
    PayrollModuleServiceLoader::class,
];

switch (env('APP_MODULE', config('app.module', 'Aipt'))) {
    case 'Aipt':
        $providers[] = AiptModuleServiceLoader::class;
        break;
    case 'School':
        $providers[] = AiptModuleServiceLoader::class;
        $providers[] = SchoolModuleServiceLoader::class;
        break;
    case 'Hospital':
        $providers[] = HospitalModuleServiceLoader::class;

        break;
    case 'Pathology':
        $providers[] = PathologyModuleServiceLoader::class;
        break;
    case 'Hotel':
        $providers[] = HotelModuleServiceLoader::class;
        break;
    case 'Restaurant':
        $providers[] = RestaurantModuleServiceLoader::class;
        break;
    case 'Payroll':
        $providers[] = PayrollModuleServiceLoader::class;
        break;
}
// Log::info("Registered Providers: %s\n", implode("\n", $providers));
return $providers;
