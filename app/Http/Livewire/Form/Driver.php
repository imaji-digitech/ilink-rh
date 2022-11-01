<?php

namespace App\Http\Livewire\Form;

use App\Models\Driver as ModelDriver;
use Livewire\Component;

class Driver extends Component
{
    public $action;
    public $data;
    public $dataId;

    public function mount()
    {
        $this->data = form_model(ModelDriver::class, $this->dataId);
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        ModelDriver::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('driver.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        ModelDriver::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('driver.index'));
    }

    public function render()
    {
        return view('livewire.form.driver');
    }

    protected function getRules()
    {
        return ModelDriver::getRules();
    }
}
