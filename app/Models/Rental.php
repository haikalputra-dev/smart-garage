<?php

namespace App\Models;

use App\Models\Garasi;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function garasi()
    {
        return $this->belongsTo(Garasi::class,'garasi_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class,'rental_id');
    }
}
