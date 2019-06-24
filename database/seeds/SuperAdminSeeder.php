<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->name='Hafijur Rahman';
        $user->email='bmsakib09.hr@gmail.com';
        $user->password=Hash::make('12345678');
        $user->type=1;
        $user->save();
    }
}
