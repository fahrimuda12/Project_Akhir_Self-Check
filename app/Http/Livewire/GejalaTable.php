<?php

namespace App\Http\Livewire;

use App\Models\Gejala;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class GejalaTable extends Table
{
    public function query(): Builder
    {
        return Gejala::query();
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
            Column::make('nip_dokter', 'Penginput'),
            Column::make('created_at', 'Created At'),
        ];
    }
}
