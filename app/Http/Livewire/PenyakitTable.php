<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\Rule;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class PenyakitTable extends Component
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

    public  function __construct()
    {
        $this->model = 'penyakit';
        $this->route = ['edit' => 'admin.kelola-data.edit-penyakit', 'delete' => 'admin.kelola-data.delete-penyakit'];
    }


    public function render()
    {
        return view('livewire.penyakit-table', ['route' => $this->route, 'model' => $this->model, 'data']);
    }

    public function paramPage(): string
    {
        return 'page_penyakit';
    }

    public function query(): Builder
    {
        return Penyakit::query();
    }

    public function queryFilter()
    {
        return [null];
    }


    public function columns(): array
    {
        // dd($penginput);
        return [
            Column::make('kode_penyakit', 'Kode'),
            Column::make('nama_penyakit', 'Penyakit'),
            Column::make('nama_dokter', 'Penginput'),
            Column::make('created_at', 'Dibuat'),
        ];
    }


    public function data()
    {
        return $this
            ->query()
            ->select('penyakit.kode_penyakit as kode_penyakit', 'penyakit.nama_penyakit as nama_penyakit', 'pakar.nama_dokter as nama_dokter', 'admin.nama_pegawai as nama_pegawai', 'penyakit.created_at as created_at')
            ->leftjoin('pakar', 'pakar.nip_dokter', '=', 'penyakit.nip_dokter')
            ->leftjoin('admin', 'admin.nip', '=', 'penyakit.nip')
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

class Column
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
