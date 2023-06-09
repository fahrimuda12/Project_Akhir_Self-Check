<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodePertanyaan extends Model
{
    use HasFactory;
    protected $table = 'node_pertanyaan';
    public $incrementing = true;
    public $timestamps = false;
    // protected $guard = 'pakar';
    protected $fillable = [
        'id_pertanyaan',
        'parent_id',
    ];
}
