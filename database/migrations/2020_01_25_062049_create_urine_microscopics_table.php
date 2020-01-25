<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrineMicroscopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urine_microscopics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cast')->nullable();
            $table->string('crystal')->nullable();
            $table->string('puscells')->nullable();
            $table->string('sec')->nullable();
            $table->string('erythrocytes')->nullable();
            $table->string('yeast')->nullable();
            $table->string('calciumxalate')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('urine_microscopics');
    }
}
