<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('r_dokter_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('dokter_id');
            $table->string('pendidikan');
            $table->string('jurusan');
            $table->string('nama_kampus');
            $table->string('tahun_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_dokter_detail');
    }
};