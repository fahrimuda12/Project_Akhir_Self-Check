<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pakar extends Authenticatable
{
    use HasFactory;
    protected $table = 'pakar';
    protected $primaryKey = 'nip_dokter';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guard = 'pakar';
    protected $fillable = [
        'nip_dokter',
        'nama_dokter',
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
    ];
}
