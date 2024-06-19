<?php

namespace Database\Seeders;

use App\Models\Rental;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rental = new Rental;
        $rental->garasi_id = 1;
        $rental->renter_id = 3;
        $rental->tanggal_mulai = "2024-05-06";
        $rental->tanggal_akhir = "2024-05-07";
        $rental->total_harga_sewa = 40000;
        $rental->status = "selesai";
        $rental->save();

        $rental = new Rental;
        $rental->garasi_id = 2;
        $rental->renter_id = 3;
        $rental->tanggal_mulai = "2024-05-20";
        $rental->tanggal_akhir = "2024-05-22";
        $rental->total_harga_sewa = 80000;
        $rental->status = "selesai";
        $rental->save();
    }
}
