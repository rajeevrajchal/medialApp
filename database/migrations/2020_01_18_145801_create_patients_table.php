<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('age');
            $table->string('address');
            $table->string('gender');
            $table->string('tn');
            $table->string('contact');
            $table->boolean('delete_flag')->default(0);
            $table->boolean('lipid_flag')->default(0);
            $table->boolean('serology_flag')->default(0);
            $table->boolean('urine_flag')->default(0);
            $table->boolean('hematology_flag')->default(0);
            $table->boolean('biochemistry_flag')->default(0);
            $table->boolean('isReport')->default(false);
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
        Schema::dropIfExists('patients');
    }
}
