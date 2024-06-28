<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rental');
            $table->integer('jumlah_pembayaran');
            $table->date('waktu_pembayaran')->nullable();
            $table->enum('status', ['pending', 'selesai', 'batal']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
