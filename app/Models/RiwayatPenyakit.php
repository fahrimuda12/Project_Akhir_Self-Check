<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    use HasFactory;
    protected $table = 'rule';

    protected $fillable = [
        'nilai_cf'
    ];
}
