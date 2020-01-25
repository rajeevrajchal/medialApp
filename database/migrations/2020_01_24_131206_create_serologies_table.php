<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hiv')->nullable();
            $table->string('hbsa')->nullable();
            $table->string('hcv')->nullable();
            $table->string('ra')->nullable();
            $table->string('crd')->nullable();
            $table->string('aso')->nullable();
            $table->string('widal')->nullable();
            $table->string('vdrl')->nullable();
            $table->string('tpha')->nullable();
            $table->string('upt')->nullable();
            $table->string('hpylori')->nullable();
            $table->string('fob')->nullable();
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
        Schema::dropIfExists('serologies');
    }
}
