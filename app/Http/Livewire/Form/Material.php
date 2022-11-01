<?php

namespace App\Http\Livewire\Form;

use App\Models\MaterialType;
use Livewire\Component;
use App\Models\Material as Model;

class Material extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $optionMaterialType;

    public function mount()
    {
        $this->optionMaterialType= eloquent_to_options(MaterialType::get());
        $this->data = form_model(Model::class, $this->dataId);
    }

    public function create()
    {
//        $this->validate();
//        $this->resetErrorBag();
        Model::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('material.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        Model::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('material.index'));
    }

    public function render()
    {
        return view('livewire.form.material');
    }

    protected function getRules()
    {
        return Model::getRules();
    }
}
