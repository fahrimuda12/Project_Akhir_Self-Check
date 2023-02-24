<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    // protected $guard = 'pakar';
    protected $fillable = [
        'pertanyaan',
        'nip',
        'nip_dokter'
    ];
}
