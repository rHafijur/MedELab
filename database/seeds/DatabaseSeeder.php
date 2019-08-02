<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
        	[
                RoleSeeder::class,
        		SuperAdminSeeder::class,
        		WordSeeder::class,
                WordAdminSeeder::class,
                DoctorSeeder::class,
                PatientSeeder::class,
                TestSeeder::class,
                MedicineSeeder::class,
                CounterAdminSeeder::class,
                LabAdminSeeder::class,
                PharmacyMedicineSeeder::class,
        	]
        );
    }
}
