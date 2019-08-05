<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id'=>1,
            'title'=>'Super Admin'
        ]);
        Role::create([
            'id'=>2,
            'title'=>'Patient'
        ]);
        Role::create([
            'id'=>3,
            'title'=>'Doctor'
        ]);
        Role::create([
            'id'=>4,
            'title'=>'Word Admin'
        ]);
        Role::create([
            'id'=>5,
            'title'=>'Pharmacy Admin'
        ]);
        Role::create([
            'id'=>6,
            'title'=>'Counter Admin'
        ]);
        Role::create([
            'id'=>7,
            'title'=>'Lab Admin'
        ]);
        Role::create([
            'id'=>8,
            'title'=>'Sample Collector'
        ]);
        Role::create([
            'id'=>9,
            'title'=>'Remote Patient'
        ]);
    }
}
