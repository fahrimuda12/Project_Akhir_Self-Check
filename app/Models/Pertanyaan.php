<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $appends = [
        'merge_bobot',
    ];

    protected function filterCode($val)
    {
        $kode = substr($val, 0, 2);
        if ($kode == "KS") {
            return 'pilgan';
        } else {
            return 'isian';
        }
    }

    public function opsi1()
    {
        return $this->hasOne(SkalarCF::class, 'kode_skalar', 'opsi_2');
    }

    public function opsi2()
    {
        return $this->hasOne(SkalarCF::class, 'opsi_2', 'kode_skalar');
    }

    public function gejala()
    {
        return $this->hasOne(Gejala::class, 'kode_gejala', 'kode_gejala');
    }

    protected function mergeBobot(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->filterCode($this->opsi_1) == 'isian') {
                    $result_opsi_1 =  isset($this->opsi_1->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_1->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $result_opsi_2 =  isset($this->opsi_2->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_2->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $result_opsi_3 =  isset($this->opsi_3->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_3->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $result_opsi_4 =  isset($this->opsi_4->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_4->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $result_opsi_5 =  isset($this->opsi_5->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_5->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $result_opsi_6 =  isset($this->opsi_6->kode_skalar) ? SkalarCF::where('kode_skalar', $this->opsi_6->kode_skalar)->select('bobot_nilai', 'skalar')->first()->makeHidden('type') : null;
                    $opsi = [$result_opsi_1, $result_opsi_2, $result_opsi_3, $result_opsi_4, $result_opsi_5, $result_opsi_6];
                    $opsi = array_filter(array_map(function ($val) {
                        return $val ? $val->toArray() : null;
                    }, $opsi));
                    // dd($opsi);
                    // var_dump($opsi);
                    // die();
                    return $opsi;
                }

                // dd($this->opsi_2->kode_skalar);
                // echo $result_opsi_2 . "<br>";

                // $kode = substr($this->kode_skalar, 0, 2);
                // if ($kode == "KS") {
                //     return 'pilgan';
                // } else {
                //     return 'isian';
                // }
            },
        );
    }

    public function treePertanyaan()
    {
        return $this->belongsTo(NodePertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
