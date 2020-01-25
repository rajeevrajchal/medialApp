<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrinePhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urine_physicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color')->nullable();
            $table->string('transparency')->nullable();
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
        Schema::dropIfExists('urine_physicals');
    }
}
