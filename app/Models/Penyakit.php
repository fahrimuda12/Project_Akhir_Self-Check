<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $primaryKey = 'kode_penyakit';
    protected $keyType = 'string';
    public $incrementing = false;
    // protected $fillable = [
    //     'nrp',
    //     'nama',
    //     'jenkel',
    //     'umur',
    //     'alamat',
    //     'no_hp',
    //     'email',
    //     'password',
    // ];

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
