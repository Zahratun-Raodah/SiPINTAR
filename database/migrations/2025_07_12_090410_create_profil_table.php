<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->string('nama_instansi');
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->string('tgl_berdiri');
            $table->string('no_sk');
            $table->string('akreditasi');
            $table->string('nama_pimpinan');
            $table->string('noHp_instansi');
            $table->string('email');
            $table->string('logo');
            $table->string('visi');
            $table->text('misi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil');
    }
};
