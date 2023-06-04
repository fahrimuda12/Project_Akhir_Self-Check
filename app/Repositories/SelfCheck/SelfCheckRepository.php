<?php

namespace App\Repositories\SelfCheck;

use App\Helpers\CFHelper;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use App\Models\TabelKeputusan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelfCheckRepository
{

    // public function analyticOnPenyakit()
    public function analyticCF($penyakit, Request $request)
    {
        try {

            // Perulangan satu periode penyakit
            for ($i = 0; $i < count($penyakit); $i++) {
                //Mendapatkan Kode Penyakit dan setiap kali periode penyakit nilai CFK menjadi 0
                $kode_penyakit = $penyakit[$i]->kode_penyakit;
                $CFK = 0;
                $CF = [];
                $keyCF = 0;
                //Perulangan setiap pertanyaan
                foreach ($request->data as $key => $value) {
                    //Mencari hasil dari rule yang sesuai
                    $result = TabelKeputusan::where('kode_penyakit', $kode_penyakit)->where('kode_gejala', $value['kode_gejala'])->first();
                    // dd($result);
                    //Jika nilai rule memiliki nilai_cf maka akan dilakukan perhitungan
                    if (isset($result->nilai_cf)) {
                        $CF_E = $result->nilai_cf;

                        if (isset($value['nilai'])) {
                            $CF_H = $value['nilai'];
                            // dd($CF_H);
                            $CF[$keyCF] = $CF_E * $CF_H;

                            if ($key  == 1) {
                                $CFK = CFHelper::calculateCF($CF[$key - 1], $CF[$key]);
                                // dd($result, $request, $penyakit[$i], $kode_penyakit, 'CF_E = ' . $CF_E, 'CF_H = ' . $CF_H, $CF[$key - 1],  $CF[$key], $CFK, $key);
                            }
                            if ($key > 1) {
                                $CF_Last = $CFK;
                                if ($keyCF != 0) {
                                    $CFK = CFHelper::calculateCF($CFK, $CF[$keyCF]);
                                }

                                // if ($i == 4) {
                                //     dd($result, $request, $penyakit[$i], $kode_penyakit, 'CF_E = ' . $CF_E, 'CF_H = ' . $CF_H, 'CF1 = ' . $CF[$key - 1], 'CF2 = ' . $CF[$key], 'CFK = ' . $CFK, 'CFK_LAST = ' . $CF_Last, $key);
                                // }
                                // dd($request, $result, $value, $key, $CFK);
                                // $CFK = ($CFK + $CF[$key]) * (1 - $CFK);
                            }
                        } else if (isset($value['hari'])) {
                            $data_skalar = json_decode($value['skalar'], true);
                            // dd($data_skalar);

                            // dd($CF_E, $CF_H,  $CF, $CFK, $key);
                            //Mencari nilai skalar
                            foreach ($data_skalar as $skalar_value) {
                                if ($value['hari'] != 0) {
                                    if ($skalar_value['skalar'] != '0') {
                                        $newSkalar = explode("-", $skalar_value['skalar']);
                                        if ($this->getBobot($value['hari'], $newSkalar[0], isset($newSkalar[1]) ? $newSkalar[1] : null)) {
                                            $CF_H = $skalar_value['bobot_nilai'];
                                        }
                                    }
                                } else {
                                    $CF_H = 0;
                                }
                            }
                            $CF[$keyCF] = $CF_E * $CF_H;
                            if ($key  == 1) {
                                $CFK = CFHelper::calculateCF($CF[$key - 1], $CF[$key]);
                                // $CFK += ($CF[$key - 1] + $CF[$key]) * (1 - $CF[$key - 1]);
                            }
                            if ($key > 1) {
                                $CF_Last = $CFK;
                                if ($keyCF != 0) {
                                    $CFK = CFHelper::calculateCF($CFK, $CF[$keyCF]);
                                }

                                // if ($i == 4 && $key == 4) {
                                //     dd($result, $request, $penyakit[$i], $kode_penyakit, 'CF_E = ' . $CF_E, 'CF_H = ' . $CF_H, 'CF1 = ' . $CFK, 'CF2 = ' . $CF[$key], 'CFK = ' . $CFK, 'CFK_LAST = ' . $CF_Last, $key, $CF);
                                // }
                                // $CFK = ($CFK + $CF[$key]) * (1 - $CFK);
                            }
                            // dd($request, $result, $value, $key, $CFK);
                        }
                        $keyCF++;
                    }
                }

                $CF_result[$i]["kodePenyakit"] = $penyakit[$i]->kode_penyakit;
                $CF_result[$i]["penyakit"] = $penyakit[$i]->nama_penyakit;
                $CF_result[$i]["cf"] = $CFK / 1 * 100;
            }
            return $CF_result;
        } catch (\Exception $error) {
            // return response()->json([
            //     'pesan' => "Gagal",
            //     'error' => $error->getMessage()
            // ]);
            dd($error);
        }
    }

    private function getBobot($data, $val1, $val2)
    {
        try {
            if ($val2 == null) {
                if ($data >= $val1) {
                    return true;
                }
            } else {
                if ($data >= $val1 && $data <= $val2) {
                    return true;
                }
            }
            return false;
        } catch (\Exception $error) {
            dd($error);
        }
    }

    public function getDiagnosa($request)
    {
        try {
            $penyakit = Penyakit::select('nama_penyakit', 'kode_penyakit')->get();
            $result = $this->analyticCF($penyakit, $request);
            usort($result, function ($a, $b) {
                return $b['cf'] <=> $a['cf'];
            });
            $this->storeRiwayatPenyakit($result);

            return $result;
        } catch (\Exception $error) {
            return response()->json([
                'pesan' => "Gagal",
                'error' => $error->getMessage()
            ]);
        }
    }

    public function storeRiwayatPenyakit($result)
    {
        DB::beginTransaction();
        try {
            $user = User::find(Auth::guard()->user()->nrp);

            foreach ($result as $key => $val) {
                // dd($user->riwayatPenyakit()->attach($val['kodePenyakit'], ['nilai_cf' => $val['cf'], 'created_at' => Carbon::now(), 'keterangan' => 'Terjangkit']));
                $user->riwayatPenyakit()->attach($val['kodePenyakit'], ['nilai_cf' => $val['cf'], 'created_at' => Carbon::now(), 'keterangan' => 'Terjangkit']);
                if ($key == 2) {
                    break;
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }


    private function testMethod($penyakit, Request $request)
    {
        // dd($request->data);
        for ($i = 0; $i < count($penyakit); $i++) {
            echo 'Penyakit ' . $penyakit[$i] . '<br>';
            echo '-------------------------------- <br>';
            $kode_penyakit = $penyakit[$i];
            $CFK = 0;
            foreach ($request->data as $key => $value) {

                // echo $value['hari'] . "<br>";
                //Melakukan pengecekan apakah setiap pertanyaan dijawab atau tidak
                $result = TabelKeputusan::where('kode_penyakit', $kode_penyakit)->where('kode_gejala', $value['kode_gejala'])->first();

                if (isset($result->nilai_cf)) {
                    $CF_E = $result->nilai_cf;
                    if (isset($value['nilai'])) {
                        echo $value['kode_gejala'] . ' = ' . $value['nilai'] . ' <br />';
                        //Mencari hasil dari rule yang sesuai



                        // if ($i > 0) {
                        // echo $value['kode_gejala'] . ' = ' . $kode_penyakit . ' = ' . $value['nilai'] . ' = ';
                        // echo $CF_E . '  --> Inisalisasi' .  '<br>';
                        // }
                        $CF_H = $value['nilai'];
                        $CF[$key] = $CF_E * $CF_H;
                        echo 'CF[H,E] ' . $key . ' = ' . $CF_E . ' X ' . $CF_H . ' = ' . $CF_E * $CF_H . '<br>';
                        if ($key  == 1) {

                            $CFK += $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]);
                            echo 'CFK ' . $key . ' = ' . $CF[$key - 1] . ' X ' . $CF[$key] . '( 1 - ' . $CF[$key - 1] . ')' . ' = ' . $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]) . '<br>';
                            echo 'CFK ' . $key . ' = ' . $CFK . '<br>';
                        }
                        if ($key > 1) {
                            echo 'CFK ' . $key . ' = ' . $CFK . ' X ' . $CF[$key] . '( 1 - ' . $CFK . ')' . ' = ' . $CFK + $CF[$key] * (1 - $CFK) . '<br>';

                            $CFK = $CFK + $CF[$key] * (1 - $CFK);
                            echo 'CFK ' . $key . ' = ' . $CFK . '<br>';
                        }
                        echo '<br>';
                    }
                    if (isset($value['hari'])) {
                        $data_skalar = json_decode($value['skalar'], true);
                        //Mencari nilai skalar
                        foreach ($data_skalar as $skalar_value) {
                            // $skalar = explode('-', $value->skalar);
                            if ($skalar_value['skalar'] != $value['hari']) {
                                if ($skalar_value['skalar'] != '0') {
                                    $newSkalar = explode("-", $skalar_value['skalar']);
                                    if ($this->getBobot($value['hari'], $newSkalar[0], $newSkalar[1])) {
                                        $CF_H = $skalar_value['bobot_nilai'];
                                        // echo ' nilai = ' . $skalar_value['bobot_nilai']  . "<br />";
                                        echo $value['kode_gejala'] . ' = ' . $skalar_value['bobot_nilai'] . '<br/>';
                                    }
                                }
                            } else {
                                $CF_H = 0;
                                echo $value['kode_gejala'] . ' = ' . 0 . '<br/>';
                            }
                        }
                        $CF[$key] = $CF_E * $CF_H;
                        echo 'CF[H,E] ' . $key . ' = ' . $CF_E . ' X ' . $CF_H . ' = ' . $CF_E * $CF_H . '<br>';
                        if ($key  == 1) {

                            $CFK += $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]);
                            echo 'CFK ' . $key . ' = ' . $CF[$key - 1] . ' X ' . $CF[$key] . '( 1 - ' . $CF[$key - 1] . ')' . ' = ' . $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]) . '<br>';
                            echo 'CFK ' . $key . ' = ' . $CFK . '<br>';
                        }
                        if ($key > 1) {
                            echo 'CFK ' . $key . ' = ' . $CFK . ' X ' . $CF[$key] . '( 1 - ' . $CFK . ')' . ' = ' . $CFK + $CF[$key] * (1 - $CFK) . '<br>';

                            $CFK = $CFK + $CF[$key] * (1 - $CFK);
                            echo 'CFK ' . $key . ' = ' . $CFK . '<br>';
                        }
                        echo '<br>';
                        // echo 'Skalar = ' . $data  . "<br />";
                    }
                }
                // echo $CF_E . '<br>';
            }

            echo '<br />';
            // dd($CFK);
            // $CF_result[$penyakit[$i]] = $CFK / 1 * 100;
        }
    }

    public function showAnalyticCF($penyakit, Request $request)
    {
        // dd($request);
        for ($i = 0; $i < count($penyakit); $i++) {
            // echo 'Penyakit ' . $penyakit[$i] . '<br>';
            // echo '-------------------------------- <br>';
            $kode_penyakit = $penyakit[$i]->kode_penyakit;
            $CFK = 0;
            foreach ($request->data as $key => $value) {
                //Melakukan pengecekan apakah setiap pertanyaan dijawab atau tidak
                if (isset($value['nilai'])) {
                    // echo $value['kode_gejala'] . ' = ' . $kode_penyakit . ' = ' . $value['nilai'] . ' = ';
                    //Mencari hasil dari rule yang sesuai
                    $result = TabelKeputusan::where('kode_penyakit', $kode_penyakit)->where('kode_gejala', $value['kode_gejala'])->first();
                    if (isset($result->nilai_cf)) {
                        $CF_E = $result->nilai_cf;

                        if (isset($value['nilai'])) {
                            $CF_H = $value['nilai'];
                            $CF[$key] = $CF_E * $CF_H;
                            if ($key  == 1) {

                                $CFK += $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]);
                            }
                            if ($key > 1) {
                                $CFK = $CFK + $CF[$key] * (1 - $CFK);
                            }
                        }
                        if (isset($value['hari'])) {
                            $data_skalar = json_decode($value['skalar'], true);
                            //Mencari nilai skalar
                            foreach ($data_skalar as $skalar_value) {
                                // $skalar = explode('-', $value->skalar);
                                if ($skalar_value['skalar'] != $value['hari']) {
                                    if ($skalar_value['skalar'] != '0') {
                                        $newSkalar = explode("-", $skalar_value['skalar']);
                                        if ($this->getBobot($value['hari'], $newSkalar[0], $newSkalar[1])) {
                                            $CF_H = $skalar_value['bobot_nilai'];
                                        }
                                    }
                                } else {
                                    $CF_H = 0;
                                }
                            }
                            $CF[$key] = $CF_E * $CF_H;
                            // dd($CF_E);
                            if ($key  == 1) {

                                $CFK += $CF[$key - 1] + $CF[$key] * (1 - $CF[$key - 1]);
                            }
                            if ($key > 1) {
                                $CFK = $CFK + $CF[$key] * (1 - $CFK);
                            }
                            // dd($CFK);
                        }
                    }
                }
            }
            // $CF_result[$i] = [[]];
            $CF_result[$i]["kodePenyakit"] = $penyakit[$i]->kode_penyakit;
            $CF_result[$i]["penyakit"] = $penyakit[$i]->nama_penyakit;
            $CF_result[$i]["cf"] = $CFK / 1 * 100;
        }
        // die();
        return $CF_result;
    }
}
