<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemoteTestOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remote_test_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('remote_patient_id')->unsigned();
            $table->foreign('remote_patient_id')->references('id')->on('remote_patients');
            $table->float('total_price');
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
        Schema::dropIfExists('remote_orders');
    }
}
