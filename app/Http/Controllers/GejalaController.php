<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use App\Models\Rule;
use App\Models\SkalarCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gejala()
    {
        Gejala::all();
    }

    public function index()
    {
        // $disease = Penyakit::with('gejala')->get();
        // $penyakit = Penyakit::all();
        // // dd($disease);
        // $query = Penyakit::select('*')
        //     ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
        //     ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')->get();
        $gejala = Gejala::all();
        $rule = Rule::paginate(10);
        $skalar = SkalarCF::all();

        // dd($disease[0]['gejala'][0]['gejala']);
        return view('admin/kelola-data/gejala/index', [
            'title' => 'Gejala',
            'gejala' => $gejala,
            'rules' => $rule,
            'skalar' => $skalar
        ]);
    }


    function encrypt_decrypt($string, $action)
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'ujian-5323565981'; // user define private key
        $secret_iv = '3620347140'; // user define secret key
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    public function getCustomIdAttribute($id)
    {
        if ($id > 9) {
            return 'G' . $id++;
        } else {
            return 'G0' . $id++;
        }
    }

    public function create()
    {
        $kode_gejala = Gejala::pluck('kode_gejala')->count();
        $kode_gejala = $this->getCustomIdAttribute($kode_gejala + 1);
        $nilai = SkalarCF::all();
        return view('admin/kelola-data/gejala/create', [
            'title' => 'Tambah Gejala',
            'nilai' => $nilai,
            'kodeGejala' => $kode_gejala,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pertanyaan' => 'required',
        ]);
        $kode_gejala = Gejala::pluck('kode_gejala')->count();
        $kode_gejala = $this->getCustomIdAttribute($kode_gejala + 1);
        // dd($request->pilgan[0] == null ? 'true' : 'false');
        // if ($request->pilgan[0] != null) {
        if ($request->skalarOption == 'pilgan') {
            Gejala::create([
                'kode_gejala' => $kode_gejala,
                'gejala' => $request->nama,
                'nip_dokter' => '197107081999032001',
            ]);
            Pertanyaan::create([
                'pertanyaan' => $request->pertanyaan,
                'opsi_1' => 'KS07',
                'opsi_2' => 'KS08',
                'opsi_3' => 'KS09',
                'kode_gejala' => $request->kode_gejala,
                'nip_dokter' => '197107081999032001'
            ]);
        } else if ($request->skalarOption == 'hari') {
            if (isset($request->hari)) {
                $kode_skalar = SkalarCF::where('kode_skalar', 'like', 'AB%')->pluck('kode_skalar')->last();
                $skalar1 = '1-' . ($request->hari - 1);
                // dd($skalar1);
                $kode_skalar1 = ++$kode_skalar;
                $kode_skalar2 = ++$kode_skalar;
                // dd($kode_skalar2);
                SkalarCF::insert([[
                    'kode_skalar' => $kode_skalar1,
                    'skalar' => $skalar1,
                    'bobot_nilai' => 0.5,
                ], [
                    'kode_skalar' => $kode_skalar2,
                    'skalar' => $request->hari,
                    'bobot_nilai' => 1,
                ]]);
                // Auth::user()->nip_dokter;
                Gejala::create([
                    'kode_gejala' => $request->kode_gejala,
                    'gejala' => $request->nama,
                    'nip_dokter' => '197107081999032001',
                ]);
                $pertanyaan = Pertanyaan::create([
                    'pertanyaan' => $request->pertanyaan,
                    'opsi_1' => 'AB01',
                    'opsi_2' => $kode_skalar1,
                    'opsi_3' => $kode_skalar2,
                    'kode_gejala' => $request->kode_gejala,
                    'nip_dokter' => '197107081999032001'
                ]);
                // dd($pertanyaan->opsi_1);
            }
        } else {
            return redirect()->route('admin.kelola-data')->with('error', 'Data skalar tidak dipilih');
        }


        return redirect()->route('admin.kelola-data')->with('success', 'Data Gejala Berhasil Ditambahkan');
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
        $id = Crypt::decrypt($id);
        $data = Gejala::join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
            ->join('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
            ->leftJoin('skalar_cf as opsi1', function ($join) {
                $join->on('opsi1.kode_skalar', '=', 'pertanyaan.opsi_1');
                // ->where('skalar_cf.bobot_nilai', '=', 'value1');
            })
            ->leftJoin('skalar_cf as opsi2', function ($join) {
                $join->on('opsi2.kode_skalar', '=', 'pertanyaan.opsi_2');
                // ->where('skalar_cf.bobot_nilai', '=', 'value2');
            })
            ->leftJoin('skalar_cf as opsi3', 'opsi3.kode_skalar', '=', 'pertanyaan.opsi_3')
            ->where('gejala.kode_gejala', $id)
            ->select('gejala.kode_gejala', 'gejala.nip_dokter', 'gejala.gejala', 'pertanyaan.id_pertanyaan', 'pertanyaan.pertanyaan', 'pakar.nama_dokter', 'opsi1.kode_skalar as kode_skalar1', 'opsi1.skalar as skalar1', 'opsi1.bobot_nilai as bobot_nilai1', 'opsi2.kode_skalar as kode_skalar2', 'opsi2.skalar as skalar2', 'opsi2.bobot_nilai as bobot_nilai2', 'opsi3.kode_skalar as kode_skalar3', 'opsi3.skalar as skalar3', 'opsi3.bobot_nilai as bobot_nilai3')
            ->first();
        // $data = Gejala::join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
        //     ->join('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
        //     ->join('skalar_cf as opsi1', 'opsi1.kode_skalar', '=', 'pertanyaan.opsi_1')
        //     ->where('gejala.kode_gejala', $id)->first();
        // dd($data);
        $nilai = SkalarCF::all();

        return view('admin/kelola-data/gejala/edit', [
            'title' => 'Edit Penyakit',
            'data' => $data,
            'nilai' => $nilai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pertanyaan' => 'required',
        ]);

        $kode_gejala = $request->kode_gejala;


        if ($request->pilgan[0] != null) {
            die();
            $kode_gejala = $request->kode_gejala;
            $gejala = Gejala::where('kode_gejala', $kode_gejala)->get();
            $gejala->gejala = $request->gejala;
            $gejala->save();
            // Gejala::where('kode_gejala', $id)->update([
            //     'kode_gejala' => $request->kode_gejala,
            //     'gejala' => $request->gejala,
            //     'nip_dokter' => $request->nip_dokter,
            //     'cf' => $request->cf,
            // ]);

            // update pertanyaan
            $pertanyaan = Pertanyaan::where('kode_gejala', $kode_gejala)->get();
            $pertanyaan->pertanyaan = $request->pertanyaan;
            $pertanyaan->save();
        } else if (isset($request->hari)) {
            $data = Gejala::join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
                ->join('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
                ->leftJoin('skalar_cf as opsi1', function ($join) {
                    $join->on('opsi1.kode_skalar', '=', 'pertanyaan.opsi_1');
                    // ->where('skalar_cf.bobot_nilai', '=', 'value1');
                })
                ->leftJoin('skalar_cf as opsi2', function ($join) {
                    $join->on('opsi2.kode_skalar', '=', 'pertanyaan.opsi_2');
                    // ->where('skalar_cf.bobot_nilai', '=', 'value2');
                })
                ->leftJoin('skalar_cf as opsi3', 'opsi3.kode_skalar', '=', 'pertanyaan.opsi_3')
                ->where('gejala.kode_gejala', $kode_gejala)
                ->select('gejala.kode_gejala', 'gejala.nip_dokter', 'gejala.gejala', 'pertanyaan.id_pertanyaan', 'pertanyaan.pertanyaan', 'pakar.nama_dokter', 'opsi1.kode_skalar as kode_skalar1', 'opsi1.skalar as skalar1', 'opsi1.bobot_nilai as bobot_nilai1', 'opsi2.kode_skalar as kode_skalar2', 'opsi2.skalar as skalar2', 'opsi2.bobot_nilai as bobot_nilai2', 'opsi3.kode_skalar as kode_skalar3', 'opsi3.skalar as skalar3', 'opsi3.bobot_nilai as bobot_nilai3')
                ->first();

            $skalar_tengah = SkalarCF::where('kode_skalar', $request->kode_skalar2)->get();
            $skalar_tengah->skalar =  '1-' . ($request->hari - 1);
            $skalar_tengah->save();
            $skalar_atas = SkalarCF::where('kode_skalar', $request->kode_skalar3)->get();
            $skalar_atas->skalar =  $request->hari;
            $skalar_atas->save();

            // dd($kode_skalar2);
            // SkalarCF::insert([[
            //     'kode_skalar' => $kode_skalar1,
            //     'skalar' => $skalar1,
            //     'bobot_nilai' => 0.5,
            // ], [
            //     'kode_skalar' => $kode_skalar2,
            //     'skalar' => $request->hari,
            //     'bobot_nilai' => 1,
            // ]]);

            // update gejala
            $kode_gejala = $request->kode_gejala;
            $gejala = Gejala::where('kode_gejala', $kode_gejala)->get();
            $gejala->gejala = $request->gejala;
            $gejala->save();

            // update pertanyaan
            $pertanyaan = Pertanyaan::where('kode_gejala', $kode_gejala)->get();
            $pertanyaan->pertanyaan = $request->pertanyaan;
            $pertanyaan->save();
            // Pertanyaan::where('kode_gejala', $id)->update([
            //     'pertanyaan' => $request->pertanyaan,
            //     'opsi_1' => 'AB01',
            //     'opsi_2' => $kode_skalar1,
            //     'opsi_3' => $kode_skalar2,
            //     'kode_gejala' => $request->kode_gejala,
            //     'nip_dokter' => '197107081999032001'
            // ]);
        } else {
            $request->validate([
                'hari' => 'required',
                'pilgan' => 'required',
            ]);
        }
        return redirect()->route('admin.kelola-data')->with('success', 'Data Gejala Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gejala = Gejala::where('kode_gejala', $id)->delete();
        $pertanyaan = Pertanyaan::where('kode_gejala', $id)->delete();
        return redirect()->route('admin.kelola-data')->with('success', 'Data Gejala Berhasil Dihapus');
    }
}
