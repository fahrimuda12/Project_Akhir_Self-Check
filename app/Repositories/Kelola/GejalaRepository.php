<?php

namespace App\Repositories\Kelola;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GejalaRepository
{
    public function storeGejala($request)
    {
        DB::beginTransaction();
        try {
            $kode_gejala = Gejala::pluck('kode_gejala')->count();
            $kode_gejala = $this->getCustomIdAttribute($kode_gejala + 1);
            // dd($request->pilgan[0] == null ? 'true' : 'false');
            // if ($request->pilgan[0] != null) {
            if ($request->skalarOption == 'pilgan') {
                Gejala::create([
                    'kode_gejala' => $kode_gejala,
                    'gejala' => $request->nama,
                    'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                    'nip' => Auth::guard('admin')->user()->nip ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                Pertanyaan::create([
                    'pertanyaan' => $request->pertanyaan,
                    'opsi_1' => 'KS01',
                    'opsi_2' => 'KS02',
                    'opsi_3' => 'KS03',
                    'kode_gejala' => $request->kode_gejala,
                    'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                    'nip' => Auth::guard('admin')->user()->nip ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            } else if ($request->skalarOption == 'inputan') {
                $kode_skalar = SkalarCF::where('kode_skalar', 'like', 'AB%')->pluck('kode_skalar')->last();
                $skalar1 = '1-' . ($request->inputan - 1);
                // dd($skalar1);
                $kode_skalar1 = ++$kode_skalar;
                $kode_skalar2 = ++$kode_skalar;
                // dd($kode_skalar2);
                SkalarCF::insert([[
                    'kode_skalar' => $kode_skalar1,
                    'skalar' => $skalar1,
                    'bobot_nilai' => 0.5,
                    'tipe' => 'inputan',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ], [
                    'kode_skalar' => $kode_skalar2,
                    'skalar' => $request->inputan,
                    'bobot_nilai' => 1,
                    'tipe' => 'inputan',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]]);


                // Auth::user()->nip_dokter;
                Gejala::create([
                    'kode_gejala' => $request->kode_gejala,
                    'gejala' => $request->nama,
                    'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                    'nip' => Auth::guard('admin')->user()->nip ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                Pertanyaan::create([
                    'pertanyaan' => $request->pertanyaan,
                    'opsi_1' => 'AB01',
                    'opsi_2' => $kode_skalar1,
                    'opsi_3' => $kode_skalar2,
                    'kode_gejala' => $request->kode_gejala,
                    'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter ?? null,
                    'nip' => Auth::guard('admin')->user()->nip ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            } else {
                DB::rollBack();
                return false;
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

    public function updateGejala($request)
    {
        DB::beginTransaction();
        try {
            $kode_gejala = $request->kode_gejala;
            $gejala = Gejala::findOrFail($kode_gejala);
            $gejala->gejala = $request->nama;
            $gejala->nip = Auth::guard('admin')->user()->nip ?? null;
            $gejala->nip_dokter = Auth::guard('pakar')->user()->nip_dokter ?? null;

            $pertanyaan = Pertanyaan::where('kode_gejala', $kode_gejala)->first();
            // dd($pertanyaan,  $request->all());
            $pertanyaan->pertanyaan = $request->pertanyaan;
            if ($request->skalarOption == "pilgan") {
                // update pertanyaan
                if (substr($pertanyaan->opsi_2, 0, 2) == "AB") {
                    SkalarCF::where('kode_skalar', $pertanyaan->opsi_2)->delete();
                }
                if (substr($pertanyaan->opsi_3, 0, 2) == "AB") {
                    SkalarCF::where('kode_skalar', $pertanyaan->opsi_3)->delete();
                }
                $pertanyaan->opsi_1 = "KS01";
                $pertanyaan->opsi_2 = "KS02";
                $pertanyaan->opsi_3 = "KS03";
            } else if ($request->skalarOption == "inputan") {
                $kode_skalar = SkalarCF::where('kode_skalar', 'like', 'AB%')->pluck('kode_skalar')->last();
                // melakukan pengecekan apakah kode skalarnya diawalin AB
                if (substr($pertanyaan->opsi_2, 0, 2) == "AB") {
                    SkalarCF::where('kode_skalar', $pertanyaan->opsi_2)->delete();
                }
                if (substr($pertanyaan->opsi_3, 0, 2) == "AB") {
                    SkalarCF::where('kode_skalar', $pertanyaan->opsi_3)->delete();
                }


                $skalar1 = '1-' . ($request->inputan - 1);
                $kode_skalar1 = ++$kode_skalar;
                $kode_skalar2 = ++$kode_skalar;
                SkalarCF::insert([[
                    'kode_skalar' => $kode_skalar1,
                    'skalar' => $skalar1,
                    'bobot_nilai' => 0,
                    'tipe' => 'inputan',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ], [
                    'kode_skalar' => $kode_skalar2,
                    'skalar' => $request->inputan,
                    'bobot_nilai' => 1,
                    'tipe' => 'inputan',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]]);
                $pertanyaan->opsi_1 = "AB01";
                $pertanyaan->opsi_2 = $kode_skalar1;
                $pertanyaan->opsi_3 = $kode_skalar2;
            }
            // $pertanyaan->kode_gejala = $kode_gejala;
            $pertanyaan->nip = Auth::guard('admin')->user()->nip ?? null;
            $pertanyaan->nip_dokter = Auth::guard('pakar')->user()->nip_dokter ?? null;
            $gejala->save();
            $pertanyaan->save();
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
