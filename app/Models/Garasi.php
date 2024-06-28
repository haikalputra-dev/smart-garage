<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
