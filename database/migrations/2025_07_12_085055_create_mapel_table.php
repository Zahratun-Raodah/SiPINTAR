<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade');
            $table->string('nama_mapel');
            $table->timestamps();
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('mapel');
    }
};
