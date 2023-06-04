<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\Rule;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RulersTable extends Component
{

    use WithPagination;

    use FilterTrait;

    public $perPage = 10;

    public $page = 1;
    public $sortBy = '';

    public $sortDirection = 'asc';

    public $route;

    public $model;

    public $data;

    public function render()
    {
        return view('livewire.rulers-table');
    }

    public function query(): Builder
    {
        return Penyakit::select(DB::raw('ROW_NUMBER() OVER (ORDER BY id) AS nomor_urut, rule.id'), 'penyakit.kode_penyakit', 'penyakit.nama_penyakit', 'gejala.gejala', 'rule.nilai_cf', 'penyakit.created_at')
            ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')
            ->orderByRaw(
                'CASE
                WHEN rule.nilai_cf IS NULL THEN 1
                ELSE 0
            END DESC'
            );
    }

    public function paramPage(): string
    {
        return 'page_rule';
    }

    public function columns(): array
    {
        return [
            ColumnRule::make('nomor_urut', 'No'),
            ColumnRule::make('kode_penyakit', 'Kode'),
            ColumnRule::make('nama_penyakit', 'Penyakit'),
            ColumnRule::make('gejala', 'Gejala'),
            ColumnRule::make('nilai_cf', 'Nilai CF'),
            ColumnRule::make('created_at', 'Created At'),
        ];
    }

    public function data()
    {
        return $this
            ->query()
            ->when($this->sortBy !== '', function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            ->paginate($this->perPage, ['*'], $this->paramPage());
    }

    public function dataFilter()
    {
        // dd($this->queryFilter());
        return $this->queryFilter();
    }

    public function paginationView()
    {
        return 'components.pagination';
    }


    public function sort($key)
    {
        $this->resetPage();

        if ($this->sortBy === $key) {
            $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortDirection = $direction;

            return;
        }

        $this->sortBy = $key;
        $this->sortDirection = 'asc';
    }

    #make function edit data
    public function editField($model, $field, $id)
    {
        if ($model == 'gejala') {
            // dd($model);
            $gejala = Pertanyaan::where($field, $id)->update(['pertanyaan' => $this->data]);
            // $this->render();
            // dd($gejala);
        } else if ($model == 'rule') {
            // dd($model);
            $gejala = Rule::where($field, $id)->update(['nilai_cf' => $this->data]);
            // dd($gejala);
        } else if ($model == 'penyakit') {
            // dd($model);
            $gejala = Penyakit::where($field, $id)->update(['nilai_cf' => $this->data]);
            // dd($gejala);
        }
    }
}


class ColumnRule
{
    public string $component = 'columns.column';

    public string $key;

    public string $label;

    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    public static function make($key, $label)
    {
        return new static($key, $label);
    }
}
