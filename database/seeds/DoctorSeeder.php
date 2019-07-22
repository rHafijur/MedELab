<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Doctor;
use App\User;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' =>'Dr. Rahim',
            'email' => 'dr.rahim@site.com',
            'password' => Hash::make('12345678'),
            'role_id' => 3,
        ])->id;
        Doctor::create([
            'user_id'=>$user_id,
            'department'=>"Cardiology",
        ]);
    }
}
