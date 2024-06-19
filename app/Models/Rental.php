<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rental';
    protected $fillable = [
        'id',
        'garasi_id',
        'renter_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'total_harga_sewa',
        'status'
    ];
}
