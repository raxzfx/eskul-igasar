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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eskul_id')->references('id_eskul')->on('eskul')->onDelete('cascade');
            $table->foreignId('pendaftaran_id')->references('id_pendaftaran')->on('pendaftaran')->onDelete('cascade');
            $table->enum('status',['hadir','sakit','izin','alpha','tidak_hadir'])->default('tidak_hadir');
            $table->integer('nilai')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
