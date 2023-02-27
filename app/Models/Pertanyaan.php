<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    public $incrementing = true;
    // protected $guard = 'pakar';
    protected $fillable = [
        'id_pertanyaan',
        'pertanyaan',
        'opsi_1',
        'opsi_2',
        'opsi_3',
        'opsi_4',
        'opsi_5',
        'opsi_6',
        'kode_gejala',
        'nip',
        'nip_dokter'
    ];
}
