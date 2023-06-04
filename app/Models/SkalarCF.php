<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalarCF extends Model
{
    use HasFactory;
    protected $table = 'skalar_cf';
    protected $primaryKey = 'kode_skalar';
    public $incrementing = false;
    protected $fillable = [
        'kode_skalar',
        'tipe',
        'skalar',
        'bobot_nilai',
    ];

    protected $appends = [
        'type',
    ];

    protected function type(): Attribute
    {
        return Attribute::make(
            get: function () {
                $kode = substr($this->kode_skalar, 0, 2);
                if ($kode == "KS") {
                    return 'pilgan';
                } else {
                    return 'isian';
                }
            },
        );
    }

    protected function mergeSkalar(): Attribute
    {
        return Attribute::make(
            get: function () {
                SkalarCF::where('kode_skalar', $this->kode_skalar)->get();
                $kode = substr($this->kode_skalar, 0, 2);
                if ($kode == "KS") {
                    return 'pilgan';
                } else {
                    return 'isian';
                }
            },
        );
    }
}
