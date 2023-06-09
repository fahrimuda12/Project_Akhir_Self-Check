<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\BaseController;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\SkalarCF;
use App\Repositories\Kelola\PenyakitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PenyakitController extends BaseController
{
    private $penyakitRepository;
    public function __construct(PenyakitRepository $penyakitRepository)
    {
        $this->penyakitRepository = $penyakitRepository;
    }

    public function index()
    {
        $disease = Penyakit::with('gejala')->get();
        $rule = Rule::paginate(10);
        return view('pakar.penyakit.index', [
            'title' => 'Penyakit',
            'diseases' => $disease,
            'rules' => $rule,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Gejala::all();
        $nilai = SkalarCF::where('kode_skalar', 'LIKE', 'KS%')->get();

        return view('pakar.penyakit.create', [
            'title' => 'Tambah Penyakit',
            'gejala' => $gejala,
            'nilai' => $nilai
        ]);
    }

    public function storePenyakit(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'gejala' => 'required',
        ]);
        $result = $this->penyakitRepository->storePenyakit($request);
        // die();
        if ($result == false) {
            return redirect()->route('pakar.penyakit.edit')->with('error', 'Data Penyakit Gagal Ditambah');
        }
        return redirect()->route('pakar.penyakit.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $penyakit = Penyakit::with('gejala')->with('rule')->where('kode_penyakit', $id)->first();
        // dd($penyakit->rule());
        $gejala = Gejala::all();
        $nilai = SkalarCF::where('kode_skalar', 'LIKE', 'KS%')->get();
        return view('pakar.penyakit.edit', [
            'title' => 'Edit Penyakit',
            'penyakit' => $penyakit,
            'gejala' => $gejala,
            'nilai' => $nilai
        ]);
    }

    public function update(Request $request, $id)
    {

        $id = Crypt::decrypt($id);
        $this->validate($request, [
            'nama' => 'required',
            'gejala' => 'required',
        ]);

        $result = $this->penyakitRepository->updatePenyakit($request, $id);
        if ($result == false) {
            return redirect()->route('pakar.penyakit.edit')->with('error', 'Data Penyakit Gagal Diubah');
        }
        return redirect()->route('pakar.penyakit.index')->withSuccess('Data Penyakit berhasil diubah');
    }

    public function destroy(Penyakit $penyakit)
    {
        DB::beginTransaction();
        try {
            $penyakit->delete();
            DB::commit();
            return redirect()->route('pakar.penyakit.index')->with('success', 'Data Penyakit Berhasil Dihapus');
        } catch (\Exception $error) {
            DB::rollback();
            dd($error->getMessage());
        }
    }
}
