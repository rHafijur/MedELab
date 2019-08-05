<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class SampleCollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->name='Nasim Rana';
        $user->email='nasim@site.com';
        $user->password=Hash::make('12345678');
        $user->role_id=8;
        $user->save();
    }
}
