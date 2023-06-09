<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        $kode = 'G01';
        $opsi_1 = 'KS01';
        $opsi_2 = 'KS02';
        $opsi_3 = 'KS03';
        $datas = [
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Sakit Kepala',
                'pertanyaan' => 'Apakah anda merasakan sakit kepala?',
                'tipe' => "pilgan"
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Demam',
                'pertanyaan' => 'Apakah suhu tubuh lebih dari 38 derajat ?',
                'tipe' => "pilgan"
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Hidung Meler',
                'pertanyaan' => 'Apakah hidung merasa mampet ?',
                'tipe' => "pilgan"
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Sakit Tenggorokan',
                'pertanyaan' => 'Apakah tenggorokan terasa sakit jika menelan ?',
                'tipe' => "pilgan"
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Bersin',
                'pertanyaan' => 'Seberapa sering anda bersin (0 jika tidak pernah)',
                'tipe' => "inputan",
                'rentang_atas' => 2,

            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Batuk',
                'pertanyaan' => 'Sudah berapa hari megalami batuk (0 jika tidak pernah)',
                'tipe' => "inputan",
                'rentang_atas' => 2,
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Akut',
                'pertanyaan' => 'Tiba-tiba mengalami gejala-gejala diatas ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Lemah Badan',
                'pertanyaan' => 'Apakah anda merasa lemah ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Sendi dan Badan',
                'pertanyaan' => 'Apakah anda merasa nyeri pada sendi maupun badan ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Mual',
                'pertanyaan' => 'Apakah anda merasa mual ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Muntah',
                'pertanyaan' => 'Apakah anda ingin muntah ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nafsu Makan Berkurang',
                'pertanyaan' => 'Apakah nafsu makan anda berkurang ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Sekret (lendir) dari hidung',
                'pertanyaan' => 'Apakah hidung anda berlendir ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Plummy Voice',
                'pertanyaan' => 'Apakah suara anda bergumam ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Sakit Gigi',
                'pertanyaan' => 'Apakah anda mengalami sakit gigi ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Badan Lesu',
                'pertanyaan' => 'Apakah badan anda susah digerakkan ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kering Tenggorokan',
                'pertanyaan' => 'Apakah tenggorokan anda terasa kering ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Tenggorokan',
                'pertanyaan' => 'Apakah anda mengalami kram pada tenggorokan ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Menyebar hingga ke telinga',
                'pertanyaan' => 'Apakah anda mengalami nyeri hingga menjalar ke telinga ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kejang',
                'pertanyaan' => 'Apakah anda mengalami kejang beberapa hari terakhir ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Bau Mulut',
                'pertanyaan' => 'Apakah mulut anda terasa bau ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Ludah Menumpuk',
                'pertanyaan' => 'Apakah ludah anda terasa seperti menumpuk didalam mulut ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Hidung Tersumbat',
                'pertanyaan' => 'Apakah anda mengalami hidung tersumbat ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Nyeri Pada Wajah',
                'pertanyaan' => 'Ketika menggerakkan mulut, apakah terasa nyeri pada wajah ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Indra Penciuman berkurang (Hiposmia)',
                'pertanyaan' => 'Merasa susah untuk mencium bau ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kehilangan Indra Penciuman',
                'pertanyaan' => 'Tidak dapat menccium bau ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Kehilangan Indra Perasa',
                'pertanyaan' => 'Tidak dapat merasakan rasa ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Sakit Telinga',
                'pertanyaan' => 'Telinga terasa sakit dan susah mendengar ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Hidung Terasa  Gatal',
                'pertanyaan' => 'Ada rasa gatal pada hidung ?',
                'tipe' => "pilgan",
            ],
            [
                'kode_gejala' => $kode++,
                'nip_dokter' => 197107081999032001,
                'gejala' => 'Hidung Terasa  Panas',
                'pertanyaan' => 'Ada rasa panas pada hidung ?',
                'tipe' => "pilgan",
            ],
        ];



        foreach ($datas as  $key => $data) {
            // $gejala = Gejala::find($data["kode_gejala"]) ? Gejala::find($data["kode_gejala"]) : new Gejala();
            if ($gejala = Gejala::find($data["kode_gejala"])) {
                $gejala->fill($data);
                $pertanyaan = Pertanyaan::where('kode_gejala', $data["kode_gejala"])->first() ? Pertanyaan::where('kode_gejala', $data["kode_gejala"])->first() : new Pertanyaan();
                if ($data["tipe"] == "pilgan") {
                    $pertanyaan->opsi_1 = "KS01";
                    $pertanyaan->opsi_2 = "KS02";
                    $pertanyaan->opsi_3 =  "KS03";
                } else {
                    $skalar1 = '1-' . ($data["rentang_atas"] - 1);
                    SkalarCF::where('kode_skalar', '=', $pertanyaan->opsi_2)->update([
                        'skalar' => $skalar1,
                        'bobot_nilai' => 0.5,
                        'tipe' => $data["tipe"],
                    ]);
                    SkalarCF::where('kode_skalar', '=', $pertanyaan->opsi_3)->update([
                        'skalar' => $data["rentang_atas"],
                        'bobot_nilai' => 1,
                        'tipe' => $data["tipe"],
                    ]);
                }
                $pertanyaan->kode_gejala = $data['kode_gejala'];
                $pertanyaan->nip_dokter = $data['nip_dokter'];
                $pertanyaan->pertanyaan = $data['pertanyaan'];
                $pertanyaan->save();
            } else {
                Gejala::create([
                    'kode_gejala' => $data["kode_gejala"],
                    'nip_dokter' => $data["nip_dokter"],
                    'gejala' => $data["gejala"],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                if ($data["tipe"] == "pilgan")
                    Pertanyaan::create([
                        'kode_gejala' => $data['kode_gejala'],
                        'nip_dokter' => $data['nip_dokter'],
                        'pertanyaan' => $data['pertanyaan'],
                        'opsi_1' => $opsi_1,
                        'opsi_2' => $opsi_2,
                        'opsi_3' => $opsi_3,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                else {
                    $kode_skalar = SkalarCF::where('kode_skalar', 'like', 'AB%')->pluck('kode_skalar')->last();

                    $skalar1 = '1-' . ($data["rentang_atas"] - 1);
                    $kode_skalar1 = ++$kode_skalar;
                    $kode_skalar2 = ++$kode_skalar;
                    SkalarCF::insert([[
                        'kode_skalar' => $kode_skalar1,
                        'skalar' => $skalar1,
                        'bobot_nilai' => 0.5,
                        'tipe' => $data["tipe"],
                    ], [
                        'kode_skalar' => $kode_skalar2,
                        'skalar' => $data["rentang_atas"],
                        'bobot_nilai' => 1,
                        'tipe' => $data["tipe"],
                    ]]);

                    Pertanyaan::create([
                        'kode_gejala' => $data['kode_gejala'],
                        'nip_dokter' => $data['nip_dokter'],
                        'pertanyaan' => $data['pertanyaan'],
                        'opsi_1' => "AB01",
                        'opsi_2' =>  $kode_skalar1,
                        'opsi_3' => $kode_skalar2,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
        }
    }

    private function aksiSimpanSkalar($data)
    {
    }
}
