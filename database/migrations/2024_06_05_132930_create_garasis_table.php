<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('garasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_garasi');
            $table->string('lokasi');
            $table->integer('harga_sewa');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['tersedia', 'booked', 'rented']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('garasi');
    }
};
