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
        'nama_penyakit'
    ];

    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(Gejala::class, 'rule', 'kode_penyakit', 'kode_gejala')->withPivot('nilai_cf');
    }

    public function rule(): HasMany
    {
        return $this->hasMany(Rule::class, 'kode_penyakit');
    }

    public function cf()
    {
        return $this->hasManyThrough(Gejala::class, Rule::class, 'kode_penyakit', 'kode_gejala', 'kode_penyakit', 'kode_gejala');
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
