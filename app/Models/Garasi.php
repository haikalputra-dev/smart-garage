<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garasi extends Model
{
    use HasFactory;
    protected $table = 'garasi';
    protected $fillable = [
        'id',
        'nama_garasi',
        'lokasi',
        'harga_sewa',
        'deskripsi',
        'status'
    ];
}
