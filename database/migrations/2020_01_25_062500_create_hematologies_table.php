<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHematologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hematologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('haemoglobin')->nullable();
            $table->string('plateles')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('malarialparasites')->nullable();
            $table->string('hba1c')->nullable();
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
        Schema::dropIfExists('hematologies');
    }
}
