<?php

namespace App\Http\Livewire;

use App\Models\NodePertanyaan;
use App\Models\Penyakit;
use App\Models\Pertanyaan;
use Livewire\Component;

class SelectParent extends Component
{
    public $node;
    public $pertanyaan_id;
    public $parent_id_key;
    // public function mount()
    // {
    //     if ($this->skalar != '') {
    //         $this->contacts = Contact::where('client_id', $this->clientId)->get();
    //     }
    // }

    public function render()
    {
        $parent_id = isset($this->node->parent_id) ? $this->node->parent_id : null;
        $id = Pertanyaan::all()->pluck('id_pertanyaan');
        return view('livewire.select-parent', ['parent_id' => $parent_id, 'id' => $id, 'pertanyaan_id' => $this->pertanyaan_id]);
    }

    public function updateParentId()
    {
        // dd($this->kode_gejala);
        // $pertanyaan = Pertanyaan::findOrfail($this->pertanyaan_id);
        $treeParent = NodePertanyaan::where('id_pertanyaan', $this->pertanyaan_id)->count() > 0 ? NodePertanyaan::where('id_pertanyaan', $this->pertanyaan_id)->first() : new NodePertanyaan();
        // dd(NodePertanyaan::where('id_pertanyaan', $this->pertanyaan_id)->count(), $treeParent->getAttribute);
        if ($treeParent->getAttribute == null) {
            // dd($treeParent);
            // dd($this->parent_id_key);
            $treeParent->id_pertanyaan = $this->pertanyaan_id;
        }
        // dd($treeParent);
        $treeParent->parent_id = $this->parent_id_key;
        if ($treeParent->save()) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            $this->emit('alert', ['type' => 'error', 'message' => 'Data gagal diupdate']);
        }

        // re-render
        $this->emit('refreshParent');
    }
}
