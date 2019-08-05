<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\RemotePatient;
use App\User;

class RemotePatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' =>'AB. Bokhtier',
            'email' => 'ab.bokhtier@site.com',
            'password' => Hash::make('12345678'),
            'role_id' => 9,
        ])->id;
        RemotePatient::create(
            [
                'user_id'=>$user_id,
                'city'=>"Dhaka",
                'street'=>"Japan garden city, Mohammadpur",
                'phone'=>'01xxxxxxxxx',
                'age'=>60,
            ]
            );
    }
}
