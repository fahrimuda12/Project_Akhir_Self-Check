<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class PenyakitTable extends Table
{
    public function query(): Builder
    {
        return Penyakit::query();
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
