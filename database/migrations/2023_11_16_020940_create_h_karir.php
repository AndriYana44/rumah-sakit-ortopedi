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
            $table->string('jurusan');
            $table->string('pengalaman');
            $table->string('bidang_pengalaman');
            $table->text('kriteria');
            $table->text('jobdesk');
            $table->text('informasi')->nullable();
            $table->date('deadline')->format('yyyy-mm-dd');
            $table->boolean('is_active')->default(true);
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
