<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\BaseController;
use App\Repositories\Kelola\GejalaRepository;
use App\Models\Gejala;
use App\Models\Pertanyaan;
use App\Models\Rule;
use App\Models\SkalarCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class GejalaController extends BaseController
{
    private $gejalaRepository;

    public function __construct(GejalaRepository $gejalaRepository)
    {
        $this->gejalaRepository = $gejalaRepository;
    }


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
        return view('pakar.gejala.index', [
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
        return view('pakar.gejala.create', [
            'title' => 'Tambah Gejala',
            'nilai' => $nilai,
            'kodeGejala' => $kode_gejala,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pertanyaan' => 'required',
            'skalarOption' => 'required',
            'inputan' => 'required_if:skalarOption,inputan',
        ]);
        $result = $this->gejalaRepository->storeGejala($request);
        if ($result == false)
            return redirect()->route('pakar.gejala.create')->with('error', 'Data Tidak berhasil ditambah');

        return redirect()->route('pakar.gejala.index')->with('success', 'Data Gejala Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Gejala::join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
            ->leftjoin('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
            ->leftjoin('admin', 'admin.nip', '=', 'gejala.nip')
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
            ->select('gejala.kode_gejala', 'gejala.nip_dokter', 'gejala.gejala', 'pertanyaan.id_pertanyaan', 'pertanyaan.pertanyaan', 'pakar.nama_dokter', 'opsi1.tipe as tipe', 'opsi1.kode_skalar as kode_skalar1', 'opsi1.skalar as skalar1', 'opsi1.bobot_nilai as bobot_nilai1', 'opsi2.kode_skalar as kode_skalar2', 'opsi2.skalar as skalar2', 'opsi2.bobot_nilai as bobot_nilai2', 'opsi3.kode_skalar as kode_skalar3', 'opsi3.skalar as skalar3', 'opsi3.bobot_nilai as bobot_nilai3')
            ->first();


        // $data = Gejala::join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
        //     ->join('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
        //     ->join('skalar_cf as opsi1', 'opsi1.kode_skalar', '=', 'pertanyaan.opsi_1')
        //     ->where('gejala.kode_gejala', $id)->first();
        // dd($data);
        $nilai = SkalarCF::all();

        return view('pakar.gejala.edit', [
            'title' => 'Edit Penyakit',
            'data' => $data,
            'nilai' => $nilai,
        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pertanyaan' => 'required',
            'skalarOption' => 'required',
            'inputan' => 'required_if:skalarOption,inputan',
        ]);

        $result = $this->gejalaRepository->updateGejala($request);

        if ($result == false)
            return redirect()->route('pakar.gejala.index')->with('error', 'Data Gejala Gagal Diubah');

        return redirect()->route('pakar.gejala.index')->with('success', 'Data Gejala Berhasil Diubah');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Gejala::where('kode_gejala', $id)->delete();
            Pertanyaan::where('kode_gejala', $id)->delete();
            DB::commit();
            return redirect()->route('pakar.gejala.index')->with('success', 'Data Gejala Berhasil Dihapus');
        } catch (\Exception $error) {
            DB::rollback();
            dd($error->getMessage());
        }
    }
}
