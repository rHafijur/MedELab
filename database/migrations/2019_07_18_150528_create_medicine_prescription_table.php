<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_prescription', function (Blueprint $table) {
            $table->integer('prescription_id');
            $table->integer('medicine_id');
            $table->tinyInteger('morning')->nullable();
            $table->tinyInteger('afternoon')->nullable();
            $table->tinyInteger('night')->nullable();
            $table->timestamps();
            $table->primary(['prescription_id','medicine_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_prescription');
    }
}
