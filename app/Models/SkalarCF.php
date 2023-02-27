<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalarCF extends Model
{
    use HasFactory;
    protected $table = 'skalar_cf';
    protected $fillable = [
        'kode_skalar',
        'skalar',
        'bobot_nilai',
    ];
}
