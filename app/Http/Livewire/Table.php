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

abstract class Table extends Component
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

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.table', ['route' => $this->route, 'model' => $this->model, 'data']);
    }

    public abstract function query(): Builder;

    public abstract function queryFilter();

    public abstract function paramPage(): string;

    public abstract function columns(): array;



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

class Column
{
    public string $component = 'columns.column';

    public string $key;

    public string $label;

    public string $defaultValue;


    public function __construct($key, $label, $defaultValue)
    {
        $this->key = $key;
        $this->label = $label;
        $this->defaultValue = $defaultValue;
    }

    public static function make($key, $label, $defaultValue = '')
    {
        return new static($key, $label, $defaultValue);
    }
}
