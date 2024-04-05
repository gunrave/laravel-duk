<?php

namespace App\Livewire;

use App\Models\Tukin as ModelsTukin;
use Livewire\Component;

class Tukin extends Component
{
    public $periode, $content, $tukinId, $slug, $status, $updateTukin = false, $addTukin = false;

    protected $rules = [
        'periode' => 'required',
    ];

    public function resetFields()
    {
        $this->periode = '';
    }

    public function render()
    {
        $tukins = ModelsTukin::latest()->get();
        return view('livewire.tukin', compact('tukins'));
    }

    public function create()
    {
        $this->resetFields();
        $this->addTukin = true;
        $this->updateTukin = false;
    }

    public function store()
    {
        $this->validate();
        try{
            ModelsTukin::create([
                'periode' => $this->periode,
            ]);

            session()->flash('success', 'Tukin Created Successfully!!');
            $this->resetFields();
            $this->addTukin = false;
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function edit($id)
    {
        try{
            $tukin = ModelsTukin::findOrFail($id);
            if(!$tukin) {
                session()->flash('error', 'Periode Tukin tidak ada');
            } else {
                $this->periode = $tukin->periode;
                $this->updateTukin = true;
                $this->addTukin = false;
            }
        } catch(\Exception $e) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function update(){
        $this->validate();
        try{
            ModelsTukin::whereId($this->tukinId)->update([
                'periode' => $this->periode,
            ]);
            session()->flash('success', 'Tukin Updated Successfully!!');
            $this->resetFields();
            $this->updateTukin = false;
        } catch(\Exception $e) {
            session()->flash('error', 'Comething goes wrong!!');
        }
    }

    public function cancel()
    {
        $this->periode = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try{
            ModelsTukin::find($id)->delete();
            session()->flash('success', 'Periode Tukin deleted successfully!!');
        } catch (\Exception $e){
            session()->flash('error', 'Something goes wrong!!');
        }
    }
}
