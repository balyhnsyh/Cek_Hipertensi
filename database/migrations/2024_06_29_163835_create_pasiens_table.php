<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->foreign('id_pasien')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('nomor_telepon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
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
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
        });

        Schema::dropIfExists('pasiens');
    }
    
}
