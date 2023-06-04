<?php

namespace App\Http\Livewire;

use App\Models\Gejala;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class GejalaTable extends Table
{
    public  function __construct()
    {
        $this->route = ['edit' => 'admin.kelola-data.edit-gejala', 'delete' => 'admin.kelola-data.delete-gejala'];
        $this->model = 'gejala';
    }
    public function query(): Builder
    {
        return Gejala::select('gejala.kode_gejala', 'gejala.gejala', 'pertanyaan.pertanyaan AS pertanyaan', 'pakar.nama_dokter AS nama_dokter', 'admin.nama_pegawai AS nama_admin', 'gejala.created_at')
            ->join('pertanyaan', 'pertanyaan.kode_gejala', '=', 'gejala.kode_gejala')
            ->leftjoin('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
            ->leftjoin('admin', 'admin.nip', '=', 'gejala.nip');
        // ->orderByRaw(
        //     'CASE
        //         WHEN pertanyaan.pertanyaan IS NULL THEN 1
        //         ELSE 0
        //     END,
        //     pertanyaan.pertanyaan ASC'
        // );
    }

    public function queryFilter()
    {
        // dd(Gejala::doesntHave('pertanyaan')->get());
        return Gejala::select('gejala.kode_gejala', 'gejala.gejala', 'pakar.nama_dokter AS nama_dokter', 'admin.nama_pegawai as nama_pegawai', 'gejala.created_at')
            ->leftjoin('pakar', 'pakar.nip_dokter', '=', 'gejala.nip_dokter')
            ->leftjoin('admin', 'admin.nip', '=', 'gejala.nip')
            ->get();
    }

    public function paramPage(): string
    {
        return 'page_gejala';
    }


    public function columns(): array
    {
        return [
            Column::make('kode_gejala', 'Kode'),
            Column::make('gejala', 'Gejala'),
            Column::make('pertanyaan', 'Pertanyaan'),
            Column::make('nama_dokter', 'Penginput', 'nama_pegawai'),
            Column::make('created_at', 'Created At'),
        ];
    }
}
