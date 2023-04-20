<?php

namespace App\Http\Livewire;

use App\Models\Gejala;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $query;
    public $gejala;
    public $highlightIndex;

    // public function mount()
    // {
    //     $this->resetSearch();
    // }

    public function resetSearch()
    {
        $this->query = '';
        $this->gejala = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->gejala) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->gejala) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectGejala($gejala)
    {
        // dd($gejala);
        // $gejala = $this->gejala[$this->highlightIndex] ?? null;
        // dd($this->highlightIndex);
        if ($gejala) {
            $this->updateGejala($gejala);
            // $this->gejala = [];
            // $this->highlightIndex = 0;
        }
    }

    public function updateGejala($gejala)
    {
        $this->query = $gejala;
        // $this->gejala = [];
        $this->highlightIndex = 0;
    }

    public function updatedQuery()
    {
        $this->gejala = Gejala::where('gejala', 'like', '%' . $this->query . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
