<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->bigInteger('prescription_id')->unsigned();
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->bigInteger('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');
            $table->bigInteger('pathology_department_id')->unsigned();
            $table->foreign('pathology_department_id')->references('id')->on('pathology_departments');
            $table->string('sample_id')->nullable()->unique();
            $table->tinyInteger('completed')->default(0);
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
        Schema::dropIfExists('test_orders');
    }
}
