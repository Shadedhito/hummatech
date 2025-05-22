<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sanksi', function (Blueprint $table) {
                $table->id();
                $table->string('nama_siswa');
                $table->string('nisn')->nullable();
                $table->unsignedBigInteger('pelanggaran_id');
                $table->unsignedBigInteger('guru_id');
                $table->date('tanggal_kejadian');
                $table->timestamps();

                $table->foreign('pelanggaran_id')->references('pelanggaran_id')->on('pelanggaran');
                $table->foreign('guru_id')->references('id_kategori')->on('guru');
            });
    }

    public function down()
    {
        Schema::dropIfExists('sanksi');
    }
};
