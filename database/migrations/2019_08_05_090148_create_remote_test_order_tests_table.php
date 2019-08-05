<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemoteTestOrderTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remote_test_order_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('remote_test_order_id');
            $table->bigInteger('test_id');
            $table->bigInteger('pathology_department_id');
            $table->string('sample_id')->nullable();
            $table->float('price');
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
        Schema::dropIfExists('remote_order_tests');
    }
}
