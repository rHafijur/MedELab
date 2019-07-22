<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\CounterAdmin;
use App\User;

class CounterAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
            'name' =>'Mr. Jaman',
            'email' => 'jaman.counter@site.com',
            'password' => Hash::make('12345678'),
            'role_id' => 6,
        ])->id;
        CounterAdmin::create(
            [
                'user_id'=>$user_id,
                'counter'=>"Counter 1",
            ]
            );
    }
}
