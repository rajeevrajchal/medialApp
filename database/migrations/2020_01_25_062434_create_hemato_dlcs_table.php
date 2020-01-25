<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHematoDlcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hemato_dlcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('neurophils')->nullable();
            $table->string('lymphocytes')->nullable();
            $table->string('monocytes')->nullable();
            $table->string('eosinophils')->nullable();
            $table->string('basophis')->nullable();
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
        Schema::dropIfExists('hemato_dlcs');
    }
}
