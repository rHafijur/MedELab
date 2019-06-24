<?php

use Illuminate\Database\Seeder;
use App\Word;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $word=new Word;
        $word->title='CCU1';
        $word->department='Cardiology';
        $word->save();
        $word=new Word;
        $word->title='CCU2';
        $word->department='Cardiology';
        $word->save();
        $word=new Word;
        $word->title='CCU2';
        $word->department='Cardiology';
        $word->save();
    }
}
