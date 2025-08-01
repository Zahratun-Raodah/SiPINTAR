<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id();
            $table->integer('id_guru');
            $table->integer('jam_ke');
            $table->string('kelas');
            $table->string('kompetensi_dasar');
            $table->string('kegiatan_belajar');
            $table->integer('absen_sakit');
            $table->integer('absen_izin');
            $table->integer('absen_alpha');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
};
