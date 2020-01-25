<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiochemistryLftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biochemistry_lfts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bilirubin_total')->nullable();
            $table->string('bilirubin_direct')->nullable();
            $table->string('sgpt_alt')->nullable();
            $table->string('sgpt_ast')->nullable();
            $table->string('alkaline_phosphatase')->nullable();
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
        Schema::dropIfExists('biochemistry_lfts');
    }
}
