<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PenyakitTable extends Table
{
    public  function __construct()
    {
        $this->model = 'penyakit';
        $this->route = ['edit' => 'admin.kelola-data.edit-penyakit', 'delete' => 'admin.kelola-data.edit-penyakit'];
    }

    public function query(): Builder
    {
        return Penyakit::query();
    }

    public function queryFilter()
    {
        return [null];
    }


    public function paramPage(): string
    {
        return 'page_penyakit';
    }

    public function columns(): array
    {
        return [
            Column::make('kode_penyakit', 'Kode'),
            Column::make('nama_penyakit', 'Penyakit'),
            Column::make('nip_dokter', 'Penginput'),
            Column::make('created_at', 'Created At'),
        ];
    }
}
