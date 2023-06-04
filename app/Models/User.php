<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $primaryKey = 'nrp';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'nrp',
        'nama',
        'jenkel',
        'umur',
        'alamat',
        'no_hp',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function riwayatPenyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'riwayat_penyakit', 'kode_pasien', 'kode_penyakit')->withPivot('nilai_cf', 'created_at', 'keterangan');
    }
}
