<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Student
 * @package App
 * @mixin Eloquent
 */
class Transact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'alamat',
        'item',
    ];
}
