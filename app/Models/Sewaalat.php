<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewaalat extends Model
{
    use HasFactory;

    protected $table = 'sewa_alat';

    protected $fillable = [
        'jenis_alat',
        'slug', 
        'tanggal_sewa', 
        'keperluan',
        'biaya_sewa'
    ];
}
