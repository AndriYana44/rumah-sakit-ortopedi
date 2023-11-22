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
        Schema::create('h_karir', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->string('pendidikan');
            $table->string('pengalaman');
            $table->string('bidang_pengalaman');
            $table->string('kriteria');
            $table->string('jobdesk');
            $table->string('informasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_karir');
    }
};
