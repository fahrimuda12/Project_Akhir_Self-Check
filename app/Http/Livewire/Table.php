<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $page = 1;
    public $sortBy = '';

    public $sortDirection = 'asc';
    public function render()
    {
        return view('livewire.table');
    }

    public abstract function query(): Builder;

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
