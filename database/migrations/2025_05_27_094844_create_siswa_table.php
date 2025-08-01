<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nipd')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nisn')->unique();
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('dusun');
            $table->string('kelurahan');
            $table->string('kelas');
            $table->string('nama_ortu');
            $table->string('pekerjaan_ortu');
            $table->string('status_ortu');
            $table->string('nomer_wa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
