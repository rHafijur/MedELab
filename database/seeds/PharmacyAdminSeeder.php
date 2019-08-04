<?php

use Illuminate\Database\Seeder;
use App\User;

class PharmacyAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->name='Monir khan';
        $user->email='ph.monir@gmail.com';
        $user->password=Hash::make('12345678');
        $user->role_id=5;
        $user->save();
    }
}
