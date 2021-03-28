<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghambat extends Model
{
    use HasFactory;

    protected $table = 'penghambat';

    protected $fillable = [
        'jenis_kejadian',
        'slug',
        'akibat',
        'jam',
        'penanggung_jawab'
    ];
}
