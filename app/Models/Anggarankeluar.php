<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggarankeluar extends Model
{
    use HasFactory;

    protected $table = 'anggaran_keluar';

    protected $fillable = [
        'jumlah_keluar',
        'slug',
        'waktu',
        'penanggung_jawab',
        'id_site'
    ];

    public function lokasi()
    {
        return $this->belongsTo(SiteProyek::class, 'id_site', 'id');
    }
}
