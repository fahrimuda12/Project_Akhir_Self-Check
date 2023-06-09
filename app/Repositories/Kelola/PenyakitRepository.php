<?php

namespace App\Repositories\Kelola;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenyakitRepository
{
    public function storePenyakit($request)
    {
        DB::beginTransaction();
        try {
            $kode = Penyakit::latest('kode_penyakit')->pluck('kode_penyakit')->first();

            $penyakit = Penyakit::create([
                'kode_penyakit' => ++$kode,
                'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                'nip' => Auth::guard('admin')->user()->nip ?? null,
                'nama_penyakit' => $request->nama,
            ]);

            for ($i = 0; $i < count($request->gejala['kode']); $i++) {
                // dd((int)substr($request->gejala[2], 0, 1));
                if (substr($request->gejala['kode'][$i], 0, 1) === 'G' && (int)substr($request->gejala['kode'][$i], 1) > 0) {
                    // echo $request->gejala[$i] . "<br />";
                    $penyakit->gejala()->attach($request->gejala['kode'][$i]);
                    Rule::where('kode_penyakit', $kode)->where('kode_gejala', $request->gejala['kode'][$i])->update([
                        'nilai_cf' => $request->gejala['nilai'][$i],
                    ]);
                } else {
                    $kode_gejala = Gejala::latest('kode_gejala')->pluck('kode_gejala')->first();
                    Gejala::create([
                        'kode_gejala' => ++$kode_gejala,
                        'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                        'nip' => Auth::guard('admin')->user()->nip ?? null,
                        'gejala' => $request->gejala['kode'][$i],
                    ]);

                    $penyakit->gejala()->attach($kode_gejala);
                    Rule::where('kode_penyakit', $kode)->where('kode_gejala', $kode_gejala)->update([
                        'nilai_cf' => $request->gejala['nilai'][$i],
                    ]);
                }
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function updatePenyakit($request, $id)
    {
        DB::beginTransaction();
        try {

            $penyakit = Penyakit::where('kode_penyakit', $id)->first();
            $penyakit->nama_penyakit = $request->nama;
            $penyakit->nip_dokter = Auth::guard('pakar')->user()->nip_dokter ?? null;
            $penyakit->nip = Auth::guard('admin')->user()->nip ?? null;

            $penyakit->save();
            if (count($request->gejala['kode']) > $penyakit->gejala()->count()) {
                for ($i = 0; $i < count($request->gejala['kode']); $i++) {
                    if ($i < $penyakit->gejala()->count()) {
                        $penyakit->gejala()->updateExistingPivot($request->gejala['kode'][$i], [
                            'nilai_cf' => $request->gejala['nilai'][$i],
                        ]);
                    } else {
                        $penyakit->gejala()->attach($request->gejala['kode'][$i], [
                            'nilai_cf' => $request->gejala['nilai'][$i],
                        ]);
                    }
                }
            } else if (count($request->gejala['kode']) == $penyakit->gejala()->count()) {
                for ($i = 0; $i < count($request->gejala['kode']); $i++) {
                    $penyakit->gejala()->updateExistingPivot($request->gejala['kode'][$i], [
                        'nilai_cf' => $request->gejala['nilai'][$i],
                    ]);
                }
            } else {
                // dd($penyakit->gejala()->get());

                // hapus table pivot yang tidak berubah
                $penyakit->gejala()->detach();
                for ($i = 0; $i < count($request->gejala['kode']); $i++) {
                    $penyakit->gejala()->attach($request->gejala['kode'][$i], [
                        'nilai_cf' => $request->gejala['nilai'][$i],
                    ]);
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $error) {
            DB::rollback();
            dd($error->getMessage());
        } catch (\Throwable $error) {
            DB::rollback();
            dd($error->getMessage());
        }
    }


    private function getCustomIdAttribute($id)
    {
        if ($id > 9) {
            return 'G' . $id++;
        } else {
            return 'G0' . $id++;
        }
    }
}
