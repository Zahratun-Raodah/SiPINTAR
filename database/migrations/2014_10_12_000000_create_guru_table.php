<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('npsn')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('grl_dpn')->nullable();
            $table->string('nama')->nullable();
            $table->string('grl_belakang')->nullable();
            $table->string('nip')->unique();
            $table->string('pangkat')->nullable();
            $table->string('gol')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('no_hp')->nullable();
            $table->string('mapel')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('agama', ['islam', 'hindu', 'kristen', 'buddha', 'konghucu'])->nullable();
            $table->enum('status', ['Guru', 'Kepala Sekolah'])->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('guru');
    }
};
