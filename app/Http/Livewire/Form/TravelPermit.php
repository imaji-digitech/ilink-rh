<?php

namespace App\Http\Livewire\Form;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TravelPermit as Model;

class TravelPermit extends Component
{
    public $action;
    public $optionDriver;
    public $data;
    public $dataId;
    public function mount(){;
//        $this->optionDriver= eloquent_to_options(\App\Models\Driver::get(),'id','name');
        $this->data=form_model(Model::class,$this->dataId);
        $this->data['user_id']=auth()->id();
    }
    public function create(){
        $this->validate();
        $this->resetErrorBag();
        $this->data['travel_permit_number']=Model::getCode($this->data=['created_at']);
        dd($this->data);
        Model::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('travel-permit.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Model::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('travel-permit.index'));
    }
    public function render()
    {
        return view('livewire.form.travel-permit');
    }
}
