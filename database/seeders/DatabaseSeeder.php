<?php

namespace Database\Seeders;


use Modules\Base\Country\Database\Seeders\CountrySeeder;
use Modules\Base\Currency\Database\Seeders\CurrencySeeder;
use Modules\Base\Role\Database\Seeders\RoleSeeder;
use Modules\Base\State\Database\Seeders\StateSeeder;
use Modules\Hotel\Amenities\Database\Seeders\AmenitiesSeeder;
use Modules\Hotel\Booking\Database\Seeders\BookingSeeder;
use Modules\Pathology\Doctor\Database\Seeders\DoctorSeeder;
use Modules\Pathology\Patient\Database\Seeders\PatientSeeder;
use Modules\Pathology\Test\Database\Seeders\TestSeeder;
use Modules\School\AcademicSession\Database\Seeders\AcademicSessionSeeder;

use Modules\School\AcademicStandard\Database\Seeders\AcademicStandardSeeder;

use Modules\School\Student\Database\Seeders\StudentSeeder;

use Modules\School\Teacher\Database\Seeders\TeacherSeeder;
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
        $connection = \Illuminate\Support\Facades\DB::getDefaultConnection();

        $seeders = [];

        // Only seed roles if NOT central, or handle based on connection
        // if ($connection !== 'central') {
        //     $seeders[] = RoleSeeder::class;
        // }

        $seeders = array_merge($seeders, [


            SampleDataSeeder::class,
        ]);

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
                    TestSeeder::class,
                    PatientSeeder::class,
                    DoctorSeeder::class,
                ];
                $seeders = array_merge($seeders, $pathologySeeders);
                break;
            case 'Hotel':
                $hotelSeeders = [
                    BookingSeeder::class,
                    AmenitiesSeeder::class,
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
