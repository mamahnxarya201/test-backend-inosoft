<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'stok',
        'mesin',
        'kapasitas_penumpang',
        'tipe',
        'kendaraan'
    ];

    protected $casts = [
      'properties' => 'json'
    ];
}
