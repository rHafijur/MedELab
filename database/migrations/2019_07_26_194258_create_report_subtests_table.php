<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSubtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_subtests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('report_id')->unsigned();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->bigInteger('subtest_id')->unsigned();
            $table->foreign('subtest_id')->references('id')->on('subtests');
            $table->string('value');
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
        Schema::dropIfExists('report_subtests');
    }
}
