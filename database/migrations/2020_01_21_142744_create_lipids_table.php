<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLipidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lipids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('totalcholesterol')->nullable();
            $table->bigInteger('triglyceride')->nullable();
            $table->bigInteger('hdl')->nullable();
            $table->bigInteger('ldl')->nullable();
            $table->bigInteger('vldl')->nullable();
            $table->bigInteger('calcium')->nullable();
            $table->bigInteger('vitaminD')->nullable();
            $table->bigInteger('vitaminB12')->nullable();
            $table->bigInteger('uric')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');
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
        Schema::dropIfExists('lipids');
    }
}
