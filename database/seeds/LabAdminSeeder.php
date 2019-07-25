<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\LabAdmin;

class LabAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' =>'Afiya Rahman',
            'email' => 'afiya@site.com',
            'password' => Hash::make('12345678'),
            'role_id' => 7,
        ])->id;
        LabAdmin::create([
            'user_id'=>$user_id,
            'pathology_department_id'=>1,
        ]);
    }
}
