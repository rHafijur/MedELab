<?php

use Illuminate\Database\Seeder;
use App\User;
use App\WordAdmin;
use Illuminate\Support\Facades\Hash;

class WordAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::create([
                'name' =>'Word man',
                'email' => 'wordadmin@site.com',
                'password' => Hash::make('12345678'),
                'role_id' => 4,
            ])->id;
            WordAdmin::create([
            	'user_id'=>$user_id,
            	'word_id'=>1,
            ]);
    }
}
