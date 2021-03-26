<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteProyek extends Model
{
    use HasFactory;

    protected $table = 'site_proyek';

    protected $fillable = [
        'nama_proyek',
        'koordinat'
    ];
}
