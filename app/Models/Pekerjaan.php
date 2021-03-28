<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';

    protected $fillable = [
        'id_site',
        'jenis_pekerjaan',
        'perkiraan_anggaran'
    ];

    public function proyek()
    {
        return $this->belongsTo(SiteProyek::class, 'id_site', 'id');
    }
}
