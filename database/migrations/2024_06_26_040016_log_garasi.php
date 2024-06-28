<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log_garasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_garasi')->constrained('garasi');
            $table->enum('status', ['Terbuka', 'Terkunci']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_garasi');
    }
};
