<?php

namespace App\Http\Livewire\Form;

use App\Models\TravelPermitDetail;
use Livewire\Component;

class TravelPermitMaterial extends Component
{
    public $travelPermitId;
    public $travelPermit;
    public $data;
    public $optionMaterial;

    public function mount()
    {
        $this->optionMaterial=[];
        foreach (\App\Models\Material::get() as $detail){
            $this->optionMaterial[] = ['title' => $detail->name, 'value' => $detail->id];
        }
        $this->setData();
    }

    public function setData()
    {

        $this->data = form_model(TravelPermitDetail::class);
        $this->travelPermit = \App\Models\TravelPermit::find($this->travelPermitId);
        $this->data['travel_permit_id']=$this->travelPermitId;
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        TravelPermitDetail::create($this->data);
        $this->setData();
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function delete($id)
    {
        TravelPermitDetail::find($id)->delete();
        $this->setData();
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil dihapus',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.form.travel-permit-material');
    }

    protected function getRules()
    {
        return TravelPermitDetail::getRules();
    }
}
