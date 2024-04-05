<?php

namespace App\Livewire;

use App\Models\Penagih;
use Livewire\Component;

class ShowPenagihs extends Component
{
    public $query;
    // public $search;
    public $penagihs;
    public $highlightIndex;

    public function mount()
    {
        $this->reset();
    }

    // public function reset()
    // {
    //     $this->query ='';
    //     $this->search = [];
    //     $this->highlightIndex = 0;
    // }

    public function incrementHighlight()
    {
        if($this->highlightIndex === count($this->penagihs) - 1){
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if($this->highlightIndex === 0){
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function selectPenagih()
    {
        $penagih = $this->penagih[$this->highlightIndex] ?? null;
        if($penagih){
            $this->redirect(route('show-penagihs', $penagih['id']));
        }
        $this->reset();
    }

    public function updatedQuery(){
        $this->penagihs = Penagih::where('nama', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.show-penagihs');
    }
}
