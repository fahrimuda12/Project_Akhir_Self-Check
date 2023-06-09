<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $primaryKey = 'kode_penyakit';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'kode_penyakit',
        'nip_dokter',
        'nip',
        'nama_penyakit'
    ];

    protected $append = [
        'total_terjangkit',
    ];

    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(Gejala::class, 'rule', 'kode_penyakit', 'kode_gejala')->withPivot('nilai_cf');
    }

    // public function gejala1(): BelongsToMany
    // {
    //     return $this->belongsToMany(Gejala::class, 'rule', 'kode_penyakit', 'kode_gejala')->withPivot('nilai_cf');
    // }

    // public function gejala2(): BelongsToMany
    // {
    //     return $this->belongsToMany(Gejala::class, 'rule', 'kode_penyakit', 'kode_gejala')->withPivot('nilai_cf');
    // }

    // public function gejala3(): BelongsToMany
    // {
    //     return $this->belongsToMany(Gejala::class, 'rule', 'kode_penyakit', 'kode_gejala')->wherePivot('nilai_cf', '=', 0.8)->withPivot('nilai_cf');
    // }

    public function rule(): HasMany
    {
        return $this->hasMany(Rule::class, 'kode_penyakit');
    }

    public function cf()
    {
        return $this->hasManyThrough(Gejala::class, Rule::class, 'kode_penyakit', 'kode_gejala', 'kode_penyakit', 'kode_gejala');
    }


    public function getTotalTerjangkitAttribute()
    {
        // dd(RiwayatPenyakit::where('kode_penyakit', $this->kode_penyakit)->get());
        return RiwayatPenyakit::where('nilai_cf', '>', 50)->where('kode_penyakit', $this->kode_penyakit)->count();
    }

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}
