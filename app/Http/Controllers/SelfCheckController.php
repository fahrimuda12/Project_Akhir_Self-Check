<?php

namespace App\Http\Controllers;

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

class SelfCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexQuiz()
    {
        // $data = [
        //     [
        //         'kode' => 'PO1',
        //         'pertanyaan' => 'Apakah kamu merasa pusing ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G01'
        //     ],
        //     [
        //         'kode' => 'PO2',
        //         'pertanyaan' => 'Apakah kamu merasa panas badan ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G02'
        //     ],
        //     [
        //         'kode' => 'PO3',
        //         'pertanyaan' => 'Apakah hidung anda tersumbat ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G03'
        //     ],
        //     [
        //         'kode' => 'PO4',
        //         'pertanyaan' => 'Terasa kaku saat membuka mulut ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G04'
        //     ],
        //     [
        //         'kode' => 'PO5',
        //         'pertanyaan' => 'Merasa nyeri tenggorokan selama 2 minggu terakhir ?',
        //         'indikator' => 'I02',
        //         'kode_gejala' => 'G05'
        //     ],
        //     [
        //         'kode' => 'PO6',
        //         'pertanyaan' => 'Ketika batuk keluar dahak ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G06'
        //     ],
        //     [
        //         'kode' => 'PO7',
        //         'pertanyaan' => 'Apakah batuknya sudah lebih 5 hari ?',
        //         'indikator' => 'I02',
        //         'kode_gejala' => 'G08'
        //     ],
        //     [
        //         'kode' => 'PO8',
        //         'pertanyaan' => 'Apakah anda sering berkeringat secara terus-menerus ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G10'
        //     ],
        //     [
        //         'kode' => 'PO9',
        //         'pertanyaan' => 'Merasa sesak saat bersuara ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G11'
        //     ],
        //     [
        //         'kode' => 'PO10',
        //         'pertanyaan' => 'Mengalami kesulitas bernapas ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G12'
        //     ],
        //     [
        //         'kode' => 'PO11',
        //         'pertanyaan' => 'Mengalami nyeri dada saat menarik nafas ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G13'
        //     ],
        //     [
        //         'kode' => 'PO12',
        //         'pertanyaan' => 'Mengalami nyeri dada saat batuk ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G14'

        //     ],
        //     [
        //         'kode' => 'PO13',
        //         'pertanyaan' => 'Memiliki ruam pada kulit atau perubahan warna ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G15'
        //     ],
        //     [
        //         'kode' => 'PO14',
        //         'pertanyaan' => 'Merasa mual atau muntah ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G16'
        //     ],
        //     [
        //         'kode' => 'PO15',
        //         'pertanyaan' => 'Mengalami nyeri otot dan sendi ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G17'
        //     ],
        //     [
        //         'kode' => 'PO16',
        //         'pertanyaan' => 'Tubuh terasa lemas ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G18'
        //     ],
        //     [
        //         'kode' => 'PO17',
        //         'pertanyaan' => 'Kesulitan bicara ataupun bergerak ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G19'
        //     ],
        //     [
        //         'kode' => 'PO18',
        //         'pertanyaan' => 'Mengalami Diare ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G20'
        //     ],
        //     [
        //         'kode' => 'PO19',
        //         'pertanyaan' => 'Mulut terasa bau ?',
        //         'indikator' => 'I01',
        //         'kode_gejala' => 'G21'
        //     ],
        // ];

        // $indikators = [
        //     [
        //         'kode' => 'I01',
        //         'indikator' => [
        //             ['Tidak', 0], ['Tidak Tahu', 0.2], ['Sedikit Yakin', 0.4], ['Cukup Yakin', 0.6], ['Yakin', 0.8], ['Sangat Yakin', 1]
        //         ]
        //         // 'indikator1' => 'Tidak',
        //         // 'bobot_indikator1' => 0,
        //         // 'indikator2' => 'Tidak Tahu',
        //         // 'bobot_indikator2' => 0.2,
        //         // 'indikator3' => 'Sedikit Yakin',
        //         // 'bobot_indikator3' => 0.4,
        //         // 'indikator4' => 'Cukup Yakin',
        //         // 'bobot_indikator4' => 0.6,
        //         // 'indikator5' => 'Yakin',
        //         // 'bobot_indikator5' => 0.7,
        //         // 'indikator6' => 'Sangat Yakin',
        //         // 'bobot_indikator6' => 0.8,

        //     ],
        //     [
        //         'kode' => 'I02',
        //         'indikator' => [
        //             ['Tidak', 0], ['Ya', 1]
        //         ]
        //     ],
        // ];

        // $data_pertanyaan = DB::table('pertanyaan')
        //     ->join('skalar_cf', 'pertanyaan.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.id', 'contacts.phone', 'orders.price')
        //     ->get();
        // $data_pertanyaan = Pertanyaan::all();
        $data_pertanyaan = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', 0);
        })->get();
        // $data_pertanyaan = $data_pertanyaan->treePertanyaan()->where('parent_id', 0)->get();
        // dd($data_pertanyaan);
        foreach ($data_pertanyaan as $key => $value) {
            // $skalar = SkalarCF::all();
            // dd($skalar[0]->type);
            $data_pertanyaan[$key]->opsi_1 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_1)->first();
            $data_pertanyaan[$key]->opsi_2 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_2)->first();
            $data_pertanyaan[$key]->opsi_3 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_3)->first();
            $data_pertanyaan[$key]->opsi_4 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_4)->first();
            $data_pertanyaan[$key]->opsi_5 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_5)->first();
            $data_pertanyaan[$key]->opsi_6 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_6)->first();
        };

        // $data_indikator = SkalarCF::all();
        // foreach ($data_pertanyaan as $value) {
        //     echo $value . "<br />";
        //     echo "<br /> <br />";
        // }
        // die();
        return view('konsul/quiz', [
            'title' => 'Quiz',
            'data' => $data_pertanyaan,
            // 'indikators' => $indikators
        ]);
    }

    public function indexQuiz2()
    {
        $gejala = Gejala::all();
        //get gejala with have much rule in table Rule
        //filter get gejala with max rule
        $count_penyakit = Penyakit::all()->count();
        $gejala_utama = collect(Gejala::select('kode_gejala')->withCount('rule')->having('rule_count', '>=', $count_penyakit - 2)->get()->toArray())->pluck('kode_gejala')->toArray();
        // dd($gejala_utama);
        //where in with condition from array

        $data_pertanyaan = Pertanyaan::whereIn('kode_gejala', $gejala_utama)->get();
        dd($data_pertanyaan);
        // dd($data_pertanyaan[0]->mergeBobot);
        foreach ($data_pertanyaan as $key => $value) {
            // $skalar = SkalarCF::all();
            // dd($skalar[0]->type);
            $data_pertanyaan[$key]->opsi_1 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_1)->first();
            $data_pertanyaan[$key]->opsi_2 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_2)->first();
            $data_pertanyaan[$key]->opsi_3 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_3)->first();
            $data_pertanyaan[$key]->opsi_4 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_4)->first();
            $data_pertanyaan[$key]->opsi_5 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_5)->first();
            $data_pertanyaan[$key]->opsi_6 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_6)->first();
        };

        // $data_indikator = SkalarCF::all();
        // foreach ($data_pertanyaan as $value) {
        //     echo $value . "<br />";
        //     echo "<br /> <br />";
        // }
        // die();
        return view('konsul/quiz2', [
            'title' => 'Quiz',
            'data' => $data_pertanyaan,
            // 'indikators' => $indikators
        ]);
    }


    private function analyticCF($penyakit, Request $request)
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

    private function getBobot($data, $val1, $val2)
    {
        if ($data >= $val1 && $data <= $val2) {
            return true;
        } else {
            return false;
        }
    }

    public function indexDiagnosa(Request $request)
    {
        // return view('konsul/diagnosa', [
        //     'title' => 'Hasil Diagnosa'
        // ]);
        //Mengambil kode setiap penyakit
        $penyakit = Penyakit::select('nama_penyakit', 'kode_penyakit')->get();
        // dd($penyakit);
        // $this->testMethod($penyakit, $request);
        // die();
        $CF_result = $this->analyticCF($penyakit, $request);
        // dd($CF_result);
        //filtering big gejala
        // array_multisort($CF_Sorting, SORT_DESC, $CF_result);
        // arsort($CF_result, SORT_ASC);

        usort($CF_result, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        $user = User::find(Auth::guard()->user()->nrp);

        // foreach ($CF_result as $key => $val) {
        //     echo $val['kodePenyakit'] . ' = ' . $val['cf'] . '<br>';
        //     // $user->riwayatPenyakit->attach($val['kodePenyakit'], ['nilai_cf' => $val['cf']]);
        // }
        DB::beginTransaction();
        try {
            foreach ($CF_result as $key => $val) {
                $user->riwayatPenyakit()->attach($val['kodePenyakit'], ['nilai_cf' => $val['cf'], 'created_at' => Carbon::now()]);
                if ($key == 3) {
                    break;
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'pesan' => "Gagal",
                'error' => $e->getMessage()
            ]);
        }


        // dd($CF_result);

        // dd($CF_result);
        // foreach ($CF_result as $key => $value) {
        //     if ($value < 0.5) {
        //         unset($CF_result[$key]);
        //     }
        // }

        // die();

        // dd($CF_result);
        // foreach ($request->data as $key => $value) {
        //     $CF_1 = $value['CF_1'];
        //     $data[$key] = $value;
        // }
        // dd($data);

        return view('konsul/diagnosa', [
            'title' => 'Hasil Diagnosa',
            'result' => $CF_result
        ]);
    }


    public function indexRiwayat()
    {
        $riwayat = User::find(Auth::guard()->user()->nrp)->riwayatPenyakit->groupBy('riwayat_penyakit.created_at');
        $riwayat = $riwayat[""];
        // dd($riwayat[0]->pivot->created_at);
        // dd($riwayat[""][0]->pivot);
        // dd($riwayat);

        return view('konsul/riwayat', [
            'title' => 'Riwayat Diagnosa',
            'riwayat' => $riwayat
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
