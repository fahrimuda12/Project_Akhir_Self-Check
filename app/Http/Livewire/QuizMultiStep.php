<?php

namespace App\Http\Livewire;

use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use Livewire\Component;

class QuizMultiStep extends Component
{
    public $title = 'Quiz';
    public $idParent = 1;
    public $currentStep = 1;
    public $totalStep;
    public $data_pertanyaan;


    public function mount()
    {
        $this->totalStep = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', '!=', null);
        })->count();
        $this->currentStep = 1;

        //get first data_pertanyaan
        $this->data_pertanyaan = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', 0);
        })->get();

        foreach ($this->data_pertanyaan as $key => $value) {
            $this->data_pertanyaan[$key]->opsi_1 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_1)->first();
            $this->data_pertanyaan[$key]->opsi_2 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_2)->first();
            $this->data_pertanyaan[$key]->opsi_3 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_3)->first();
            $this->data_pertanyaan[$key]->opsi_4 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_4)->first();
            $this->data_pertanyaan[$key]->opsi_5 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_5)->first();
            $this->data_pertanyaan[$key]->opsi_6 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_6)->first();
        };
    }


    public function render()
    {



        return view('livewire.quiz-multi-step');
    }


    public function setDataPertanyaan()
    {
        //get first data_pertanyaan
        $this->data_pertanyaan = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', 0);
        })->get();

        foreach ($this->data_pertanyaan as $key => $value) {
            $this->data_pertanyaan[$key]->opsi_1 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_1)->first();
            $this->data_pertanyaan[$key]->opsi_2 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_2)->first();
            $this->data_pertanyaan[$key]->opsi_3 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_3)->first();
            $this->data_pertanyaan[$key]->opsi_4 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_4)->first();
            $this->data_pertanyaan[$key]->opsi_5 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_5)->first();
            $this->data_pertanyaan[$key]->opsi_6 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_6)->first();
        };
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        // $this->validateData();

        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
}
