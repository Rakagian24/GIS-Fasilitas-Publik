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
        Schema::create('Fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama fasilitas
            $table->text('alamat'); // Alamat lengkap
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->onDelete('cascade'); // Relasi ke tabel kecamatan
            $table->foreignId('tipe_id')->constrained('tipe_fasilitas')->onDelete('cascade'); // Relasi ke tabel tipe_fasilitas
            $table->string('no_telp')->nullable(); // Nomor telepon
            $table->double('latitude', 10, 6); // Koordinat lintang
            $table->double('longitude', 10, 6); // Koordinat bujur
            $table->string('gambar')->nullable(); // Path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Fasilitas');
    }
};
