<?php

namespace App\Http\Livewire;

use App\Models\NodePertanyaan;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use Livewire\Component;

class QuizMultiStep extends Component
{
    public $title = 'Quiz';
    public $idParent = 1;
    public $currentStep = 1;
    public $totalSteps;
    public $data;

    public $answer = [];
    public $nextQuiz = [];

    public function mount()
    {
        $this->totalSteps = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', '!=', null);
        })->count();
        // dd($this->totalSteps);
        // $this->totalSteps = NodePertanyaan::max('parent_id');

        // dd($this->totalSteps);

        $this->currentStep = 1;

        //get first data_pertanyaan
        // $this->data = Pertanyaan::whereHas('treePertanyaan', function ($query) {
        //     $query->where('parent_id', 0);
        // })->get();
        $this->data = Pertanyaan::all();

        $this->answer = [];
    }


    public function render()
    {
        // dd($this->data[0]->treePertanyaan);
        // dd(isset($this->data[0]->opsi1), $this->data[0]->opsi1, $this->data[0]->opsi1->skalar, $this->data[0]->opsi2);
        // dd($this->data);
        return view('livewire.quiz-multi-step');
    }


    public function setDataPertanyaan()
    {
        //get first data_pertanyaan
        $this->data = Pertanyaan::whereHas('treePertanyaan', function ($query) {
            $query->where('parent_id', $this->currentStep);
        })->get();

        foreach ($this->data as $key => $value) {
            $this->data[$key]->opsi_1 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_1)->first();
            $this->data[$key]->opsi_2 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_2)->first();
            $this->data[$key]->opsi_3 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_3)->first();
            $this->data[$key]->opsi_4 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_4)->first();
            $this->data[$key]->opsi_5 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_5)->first();
            $this->data[$key]->opsi_6 = SkalarCF::select('kode_skalar', 'skalar', 'bobot_nilai')->where('kode_skalar', $value->opsi_6)->first();
        };
    }

    public function validateData()
    {
        $this->validate([
            'data.*.nilai' => 'required',
        ], [
            'data.*.nilai.required' => 'Jawaban tidak boleh kosong',
        ]);
    }

    public function increaseStep()
    {

        $i = 0;
        foreach ($this->answer as $key => $item) {
            if ($item >= 0.5) {
                // $this->nextQuiz[$i] = [
                //     "res" => true,
                //     "parent_id" => $key
                // ];
                $this->nextQuiz[$i] = $key;
                // $this->nextQuiz = true;
                $i++;
            }
        }
        // dd($this->answer, $this->nextQuiz);
        // dd($this->nextQuiz, $this->currentStep++);
        $this->resetErrorBag();
        $this->validateData();
        // $this->setDataPertanyaan();
        $this->currentStep++;
        // dd($this->currentStep);
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        // $this->setDataPertanyaan();
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
}
