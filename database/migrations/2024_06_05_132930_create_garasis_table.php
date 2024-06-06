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
        Schema::create('garasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_garasi');
            $table->string('lokasi');
            $table->int('harga_sewa');
            $table->text('deskripsi');
            $table->enum('status',['tersedia','booked','rented']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garasis');
    }
};
