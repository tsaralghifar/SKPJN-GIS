<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'proyek_name',
        'jadwal_pengerjaan',
        'jadwal_estimasi'
    ];

    public function proyek()
    {
        return $this->belongsTo(SiteProyek::class, 'proyek_name', 'id');
    }
}
