<?php

namespace Database\Seeders;


use App\Modules\Base\Country\Database\Seeders\CountrySeeder;
use App\Modules\Base\Currency\Database\Seeders\CurrencySeeder;
use App\Modules\Base\Role\Database\Seeders\RoleSeeder;
use App\Modules\Base\State\Database\Seeders\StateSeeder;
use App\Modules\School\AcademicSession\Database\Seeders\AcademicSessionSeeder;

use App\Modules\School\AcademicStandard\Database\Seeders\AcademicStandardSeeder;

use App\Modules\School\Student\Database\Seeders\StudentSeeder;

use App\Modules\School\Teacher\Database\Seeders\TeacherSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
                // AppModuleSeeder::class,
            RoleSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            SampleDataSeeder::class,
        ];

        switch (env('APP_MODULE')) {
            case 'Aipt':
                $aiptSeeders = [
                    // Add Aipt-specific seeders here
                ];
                $seeders = array_merge($seeders, $aiptSeeders);
                break;
            case 'School':
                $schoolSeeders = [
                    AcademicStandardSeeder::class,
                    AcademicSessionSeeder::class,
                    StudentSeeder::class,
                    TeacherSeeder::class,
                ];
                $seeders = array_merge($seeders, $schoolSeeders);
                break;
            case 'Hospital':
                $hospitalSeeders = [
                    // Hospital-specific seeders
                ];
                $seeders = array_merge($seeders, $hospitalSeeders);
                break;
            case 'Pathology':
                $pathologySeeders = [
                    \App\Modules\Pathology\Test\Database\Seeders\TestSeeder::class,
                    \App\Modules\Pathology\Patient\Database\Seeders\PatientSeeder::class,
                    \App\Modules\Pathology\Doctor\Database\Seeders\DoctorSeeder::class,
                ];
                $seeders = array_merge($seeders, $pathologySeeders);
                break;
            case 'Hotel':
                $hotelSeeders = [
                    \App\Modules\Hotel\Booking\Database\Seeders\BookingSeeder::class,
                    \App\Modules\Hotel\Amenities\Database\Seeders\AmenitiesSeeder::class,
                ];
                $seeders = array_merge($seeders, $hotelSeeders);
                break;
            case 'Restaurant':
                $restaurantSeeders = [
                    // Add Restaurant-specific seeders here
                ];
                $seeders = array_merge($seeders, $restaurantSeeders);
                break;
        }
        $this->call($seeders);
    }
}
