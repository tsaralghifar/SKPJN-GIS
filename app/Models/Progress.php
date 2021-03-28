<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $fillable = [
        'id_proyek',
        'tanggal_progress',
        'kemajuan'
    ];

    public function progress()
    {
        return $this->belongsTo(SiteProyek::class, 'id_proyek', 'id');
    }
}
