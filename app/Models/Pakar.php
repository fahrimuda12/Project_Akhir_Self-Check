<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pakar extends Authenticatable // Makai Authenticatabale dikarenakan model ini digunakan sebagai authentikasi
{
    use HasFactory;
    protected $table = 'pakar';
    protected $primaryKey = 'nip_dokter'; // deklarasikan ini jika primary keynya tidak id misal id_pakar mkaa deklarasikan id_pakar
    protected $keyType = 'string'; // deklarasikan ini jika primary keynya string
    public $incrementing = false;
    protected $guard = 'pakar'; // deklarasikan ini dia menggunakan middleware apa
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
