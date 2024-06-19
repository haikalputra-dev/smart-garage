<?php

namespace Database\Seeders;

use App\Models\Garasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GarasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi A001";
        $garasi->lokasi = "Area A";
        $garasi->harga_sewa = 40000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "tersedia";
        $garasi->save();

        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi A002";
        $garasi->lokasi = "Area A";
        $garasi->harga_sewa = 40000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "booked";
        $garasi->save();

        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi B001";
        $garasi->lokasi = "Area B";
        $garasi->harga_sewa = 45000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "tersedia";
        $garasi->save();

        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi C001";
        $garasi->lokasi = "Area C";
        $garasi->harga_sewa = 60000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "tersedia";
        $garasi->save();

        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi A003";
        $garasi->lokasi = "Area A";
        $garasi->harga_sewa = 40000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "booked";
        $garasi->save();

        $garasi = new Garasi;
        $garasi->nama_garasi = "Garasi B002";
        $garasi->lokasi = "Area B";
        $garasi->harga_sewa = 45000;
        $garasi->deskripsi = "Lorem Ipsum Dolor Sit Amet";
        $garasi->status = "rented";
        $garasi->save();
    }
}
