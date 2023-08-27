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
        Schema::create('m_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama_dokter');
            $table->string('spesialis');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('foto');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_dokter');
    }
};
