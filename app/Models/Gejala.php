<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $primaryKey = 'kode_gejala';
    protected $keyType = 'string';
    public $incrementing = false;
    // protected $guard = 'pakar';
    protected $fillable = [
        'gejala',
        'kode_gejala',
        'nip_dokter',

    ];

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'rule', 'kode_gejala', 'kode_penyakit');
    }
}
