<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'id',
        'rental_id',
        'jumlah_pembayaran',
        'waktu_pembayaran',
        'status'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class,'rental_id');
    }
}
