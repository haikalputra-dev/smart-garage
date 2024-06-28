<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogGarasi extends Model
{
    use HasFactory;
    protected $table = 'log_garasi';
    protected $fillable = ['id_garasi', 'status'];
}
