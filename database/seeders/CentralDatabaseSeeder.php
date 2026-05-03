<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\Tenant\Database\Seeders\TenantSeeder;
use Modules\Base\Country\Database\Seeders\CountrySeeder;
use Modules\Base\Currency\Database\Seeders\CurrencySeeder;
use Modules\Base\State\Database\Seeders\StateSeeder;

class CentralDatabaseSeeder extends Seeder
{
    /**
     * Seed the central database.
     */
    public function run(): void
    {
        $this->call([
            TenantSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
        ]);
    }
}
