<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Patient;
use App\User;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' =>'Abdul Karim',
            'email' => 'karim@site.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ])->id;
        Patient::create(
            [
                'user_id'=>$user_id,
                'word_id'=>1,
                'phone'=>'01xxxxxxxxx',
                'age'=>30,
                'attendants_name'=>'Abdul Majid',
                'attendants_phone'=>'01xxxxxxxxx',
                'bed'=>'bed 1',
                'address'=>'Dhanmondi Dhaka',
            ]
            );
    }
}
