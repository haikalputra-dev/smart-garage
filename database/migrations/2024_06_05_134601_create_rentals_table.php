<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garasi_id')->constrained('garasi');
            $table->foreignId('renter_id')->constrained('users');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->enum('status', ['aktif', 'pending', 'selesai', 'batal']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rental');
    }
};
