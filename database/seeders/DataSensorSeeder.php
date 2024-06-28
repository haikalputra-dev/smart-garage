<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\LogGarasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        // Sample data to insert
        $data = [
            [
                'id_garasi' => 1,
                'suhu' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more entries as needed
        ];

        // Insert data into the database
        DB::table('data_sensor')->insert($data);
    }
}
