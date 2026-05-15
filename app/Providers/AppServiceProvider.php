<?php

namespace App\Providers;

use App\Support\Contracts\BaseRepositoryInterface;
use App\Support\Contracts\CachedRepositoryInterface;
use App\Support\Repositories\BaseRepository;
use App\Support\Repositories\CachedRepository;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Guard;
use Modules\Aipt\Customer\Models\Customer;
use Modules\Aipt\Distributor\Models\Distributor;
use Modules\Aipt\StorageUnit\Models\StorageUnit;
use Modules\Aipt\Supplier\Models\Supplier;
use Modules\Aipt\Vendor\Models\Vendor;
use Modules\App\Agent\Models\Agent;
use Modules\Base\Company\Models\Company;
use Modules\Payroll\Employee\Models\Employee;
use Modules\School\Campus\Models\Campus;
use Modules\School\EducationBoard\Models\EducationBoard;
use Modules\School\Guardian\Models\Guardian;
use Modules\School\Student\Models\Student;

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
        $this->loadMigrationsFrom(database_path('migrations/central'));

        if ($this->app->runningInConsole()) {
            $this->commands([
                \App\Console\Commands\CentralDatabaseManager::class,
                \App\Console\Commands\TenantDatabaseManager::class,
            ]);
        }
        Relation::enforceMorphMap([

            'agent' => Agent::class,
            'customer' => Customer::class,
            'distributor' => Distributor::class,
            'employee' => Employee::class,

            'supplier' => Supplier::class,
            'vendor' => Vendor::class,
            // 'delivery_place' => DeliveryPlace::class,
            'company' => Company::class,
            'storage_unit' => StorageUnit::class,
            'education_board' => EducationBoard::class,
            'campus' => Campus::class,
            'student' => Student::class,
            'guardian' => Guardian::class,
        ]);
    }
}
