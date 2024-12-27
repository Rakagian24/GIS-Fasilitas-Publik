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
        Schema::create('Tipe_Fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama tipe fasilitas (Bank, Stasiun, dll.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tipe_Fasilitas');
    }
};
