<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RulersTable extends Table
{
    public  function __construct()
    {
        $this->route = ['edit' => 'admin.kelola-data.edit-penyakit', 'delete' => 'admin.kelola-data.edit-penyakit'];
        $this->model = 'rule';
    }
    public function query(): Builder
    {
        return Penyakit::select('*')
            ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')
            ->orderByRaw(
                'CASE
                    WHEN rule.nilai_cf IS NULL THEN 1
                    ELSE 0
                END DESC'
            );
    }

    public function queryFilter()
    {
        return [null];
    }

    public function paramPage(): string
    {
        return 'page_rule';
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'ID'),
            Column::make('kode_penyakit', 'Kode'),
            Column::make('nama_penyakit', 'Penyakit'),
            Column::make('gejala', 'Gejala'),
            Column::make('nilai_cf', 'Nilai CF'),
            Column::make('created_at', 'Created At'),
        ];
    }
}
