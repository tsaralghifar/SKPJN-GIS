<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pekerjaan','jenis_pekerjaan','perkiraan_anggaran'
    ];

    public function proyek()
    {
        return $this->belongsTo(SiteProyek::class, 'nama_pekerjaan', 'id');
    }
}
