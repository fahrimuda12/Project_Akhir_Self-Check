<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use Livewire\Component;

class SelectDynamic extends Component
{
    public $cf;
    public $skalar;
    public $kode_penyakit;
    public $kode_gejala;
    // public function mount()
    // {
    //     if ($this->skalar != '') {
    //         $this->contacts = Contact::where('client_id', $this->clientId)->get();
    //     }
    // }

    public function render()
    {
        return view('livewire.select-dynamic', ['cf' => $this->cf]);
    }

    public function updateSkalarValue()
    {
        // dd($this->kode_gejala);
        $penyakit = Penyakit::where('kode_penyakit', $this->kode_penyakit)->first();
        // dd($penyakit);
        $result = $penyakit->gejala()->updateExistingPivot($this->kode_gejala, ['nilai_cf' => $this->skalar]);

        //handle error
        if ($result) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            $this->emit('alert', ['type' => 'error', 'message' => 'Data gagal diupdate']);
        }


        // re-render
        $this->emit('refreshParent');
    }
}
