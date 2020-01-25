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
            $table->string('totalcholesterol')->nullable();
            $table->string('triglyceride')->nullable();
            $table->string('hdl')->nullable();
            $table->string('ldl')->nullable();
            $table->string('vldl')->nullable();
            $table->string('calcium')->nullable();
            $table->string('vitaminD')->nullable();
            $table->string('vitaminB12')->nullable();
            $table->string('uric')->nullable();
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
