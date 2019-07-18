<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');
            $table->string('title');
            // $table->float('m_min',8,2)->nullable();
            // $table->float('m_max',8,2)->nullable();
            // $table->float('f_min',8,2)->nullable();
            // $table->float('f_max',8,2)->nullable();
            // $table->float('a_max',8,2)->nullable();
            // $table->float('a_min',8,2)->nullable();
            // $table->float('c_max',8,2)->nullable();
            // $table->float('c_min',8,2)->nullable();
            $table->string('reference_values');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtests');
    }
}
