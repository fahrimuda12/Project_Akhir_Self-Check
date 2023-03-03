<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class RulersTable extends Table
{
    public function query(): Builder
    {
        return Penyakit::select('*')
            ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala');
    }

    public function columns(): array
    {
        return [
            Column::make('kode_penyakit', 'Kode'),
            Column::make('nama_penyakit', 'Penyakit'),
            Column::make('gejala', 'Gejala'),
            Column::make('nilai_cf', 'Nilai CF'),
            Column::make('created_at', 'Created At'),
        ];
    }
}
