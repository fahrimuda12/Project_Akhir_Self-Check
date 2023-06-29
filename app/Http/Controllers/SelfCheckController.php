<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use App\Models\TabelKeputusan;
use App\Models\User;
use App\Repositories\SelfCheck\SelfCheckRepository;
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
    public function indexQuiz(Request $request)
    {
        $request->session()->forget('is_reloaded');
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
        $data_pertanyaan = Pertanyaan::all();
        // $data_pertanyaan = Pertanyaan::whereHas('treePertanyaan', function ($query) {
        //     $query->where('parent_id', 0);
        // })->get();

        // dd($data_pertanyaan[0]->opsi1);
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
        return view('user/konsul/quiz', [
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

    public function indexDiagnosa(Request $request, $CF_result = null)
    {
        // if ($request->session()->has('is_reloaded')) {
        //     // Pengguna melakukan reload, lakukan pengalihan ke rute lain
        //     return redirect()->route('konsul.quiz');
        // }

        $CF_result = (new SelfCheckRepository)->getDiagnosa($request);

        // delete all request
        // $request->session()->put('is_reloaded', true);
        return view('user.konsul.diagnosa', [
            'title' => 'Hasil Diagnosa',
            'result' => $CF_result
        ]);
    }


    public function indexRiwayat()
    {
        $riwayat = User::find(Auth::guard()->user()->nrp)->riwayatPenyakit->groupBy('riwayat_penyakit.nilai_cf');
        if ($riwayat->isEmpty()) {
            return view('user.konsul.riwayat', [
                'title' => 'Riwayat Diagnosa',
                'riwayat' => $riwayat
            ]);
        }
        $riwayat = $riwayat[""];
        // dd($riwayat);

        // kelompokkan riwayat penyakit berdasarkan tanggal dan menjadi satu array
        // $riwayat = $riwayat->groupBy('riwayat_penyakit.created_at');

        // dd($riwayat[0]->pivot->created_at);
        // dd($riwayat[""][0]->pivot);
        // dd($riwayat);

        return view('user.konsul.riwayat', [
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
