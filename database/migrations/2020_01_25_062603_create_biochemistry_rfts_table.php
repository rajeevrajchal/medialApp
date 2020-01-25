<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiochemistryRftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biochemistry_rfts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urea')->nullable();
            $table->string('creatinine')->nullable();
            $table->string('sodium')->nullable();
            $table->string('potassium')->nullable();
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
        Schema::dropIfExists('biochemistry_rfts');
    }
}
