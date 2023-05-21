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

    public function pertanyaan()
    {
        return $this->hasOne(Pertanyaan::class, 'kode_gejala', 'kode_gejala');
    }

    public function rule()
    {
        return $this->hasMany(Rule::class, 'kode_gejala');
    }

    public function cf()
    {
        return $this->hasManyThrough(Gejala::class, Rule::class, 'kode_penyakit', 'kode_gejala', 'kode_penyakit', 'kode_gejala');
    }

    // public function havePertanyaan()
    // {
    //     return count($this->pertanyaan()->exists());
    // }
}
