<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahankonstruksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'material','slug','satuan','volume'
    ];
}
