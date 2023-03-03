<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Rule;
use App\Models\Gejala;
use Illuminate\Database\Eloquent\Builder;

class RuleTable extends DataTableComponent
{
    // protected $model = Penyakit::class;
    public string $tableName = 'users1';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("kode_penyakit", "kode_penyakit")
                ->sortable(),
            Column::make("Penyakit", "nama_penyakit")->sortable(),
            Column::make("Gejala")->sortable()
                // ->label(fn ($row) => $row->gejala->dump()->map(fn ($item, int $key) => $item->gejala)),
                // ->label(fn ($row, int $key) => $row->gejala->map(fn ($item) => $key)),
                ->label(fn ($row, Column $column) => $column),
            // Column::make("Nilai CF")->sortablegejala(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        // return Penyakit::query();
        // return Penyakit::class::with('gejala');
        return Penyakit::query()
            ->join('rule', 'penyakit.kode_penyakit', '=', 'rule.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala');
        // ->select('penyakit.nama_penyakit', 'rule.nilai_cf', 'gejala.gejala'); // Select some things
    }
}
