<?php

namespace Database\Seeders;

use App\Models\LogGarasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garasi = new LogGarasi;
        $garasi->id_garasi= 1;
        $garasi->status='Terkunci';
        $garasi->save();
    }
}
