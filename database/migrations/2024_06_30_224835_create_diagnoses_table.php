<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosesTable extends Migration
{
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('id_diagnosa');
            $table->unsignedBigInteger('id_pasien');
            $table->string('gejala_id');
            $table->timestamps();
            
            $table->foreign('id_pasien')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnoses');
    }
}
