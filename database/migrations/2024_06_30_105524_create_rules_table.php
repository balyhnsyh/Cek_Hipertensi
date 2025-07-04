<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('penyakit_id');
            $table->string('gejala_id');
            $table->string('solusi_id');
            $table->timestamps();

            $table->foreign('penyakit_id')->references('id_penyakit')->on('data_penyakits')->onDelete('cascade');
            $table->foreign('gejala_id')->references('id_gejala')->on('data_gejalas')->onDelete('cascade');
            $table->foreign('solusi_id')->references('id_solusi')->on('data_solusis')->onDelete('cascade');

            $table->index('penyakit_id');
            $table->index('gejala_id');
            $table->index('solusi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
