<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_sensor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_garasi')->constrained('garasi');
            $table->double('suhu', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_sensor');
    }
};
