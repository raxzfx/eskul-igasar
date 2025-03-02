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
        Schema::create('eskul', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->string('nama_eskul');
            $table->text('deskripsi');
            $table->string('hari');
            $table->foreignId('pembina')->references('id_guru')->on('guru')->onDelete('cascade');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('tempat');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskul');
    }
};
