<?php

use Illuminate\Database\Seeder;
use App\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::create(['title'=>'Flugal','group'=>'Fluconazole','power'=>'50 mg','company'=>'SQUARE']);
        Medicine::create(['title'=>'Ace','group'=>'Paracetamol','power'=>'500 mg','company'=>'SQUARE']);
        Medicine::create(['title'=>'Alatrol','group'=>'Cetirizine HCl','power'=>'500 mg','company'=>'SQUARE']);
    }
}
