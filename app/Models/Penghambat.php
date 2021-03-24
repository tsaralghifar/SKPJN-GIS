<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghambat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kejadian','slug','akibat','jam','penanggung_jawab'
    ];
}
