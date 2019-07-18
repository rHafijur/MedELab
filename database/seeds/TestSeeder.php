<?php

use Illuminate\Database\Seeder;
use App\PathologyDepartment;
use App\Test;
use App\Subtest;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pdid= PathologyDepartment::create(['title'=>'Hematology'])->id;
        $tid= Test::create(['pathology_department_id'=>$pdid,'title'=>'White Blood Cells','sample_type'=>'blood'])->id;
        Subtest::create(['test_id'=>$tid,'title'=>'Total WBC','reference_values'=>'Adult: 4000-1100  Child: 5000-15000','unit'=>'/Cmm']);
        Subtest::create(['test_id'=>$tid,'title'=>'Circulation Eosinophils','reference_values'=>'50-500','unit'=>'/Cmm']);

        $tid= Test::create(['pathology_department_id'=>$pdid,'title'=>'Platelets','sample_type'=>'blood'])->id;
        Subtest::create(['test_id'=>$tid,'title'=>'Total Platelet Count','reference_values'=>'150000-450000','unit'=>'/Cmm']);
        Subtest::create(['test_id'=>$tid,'title'=>'MPV','reference_values'=>'5.0-9.0','unit'=>'fl']);
    }
}
