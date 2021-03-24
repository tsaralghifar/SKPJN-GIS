<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaranmasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_masuk','slug','waktu','penanggung_jawab'
    ];
}
