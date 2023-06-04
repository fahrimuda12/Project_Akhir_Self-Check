<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penyakit';

    protected $fillable = [
        'nilai_cf'
    ];
}
