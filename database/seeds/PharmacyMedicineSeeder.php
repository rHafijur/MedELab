<?php

use Illuminate\Database\Seeder;
use App\PharmacyMedicine;

class PharmacyMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PharmacyMedicine::create(['title'=>'Flugal','group'=>'Fluconazole','power'=>'50 mg','company'=>'SQUARE','price'=>6.50]);
        PharmacyMedicine::create(['title'=>'Ace','group'=>'Paracetamol','power'=>'500 mg','company'=>'SQUARE','price'=>2.50]);
        PharmacyMedicine::create(['title'=>'Alatrol','group'=>'Cetirizine HCl','power'=>'500 mg','company'=>'SQUARE','price'=>4.20]);
    }
}
