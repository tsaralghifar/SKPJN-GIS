<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel',
        'slug', 
        'jumlah', 
        'id_site'
    ];

    public function lokasi()
    {
        return $this->belongsTo(SiteProyek::class, 'id_site', 'id');
    }
}
