<?php

namespace App\Http\Livewire\Form;

use App\Models\Invoice as Model;
use App\Models\InvoiceStatus;
use Livewire\Component;

class Invoice extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $optionInvoiceStatus;

    public function mount()
    {
        $this->optionInvoiceStatus = eloquent_to_options(InvoiceStatus::get(), 'id', 'title');
        $this->data = form_model(Model::class, $this->dataId);
        if ($this->dataId == null) {
            $this->data['user_id'] = auth()->id();
        }
    }

    public function create()
    {
//        dd($this->data);
        $this->validate();
        $this->resetErrorBag();
        Model::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('invoice.index'));
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
        $this->emit('redirect', route('invoice.index'));
    }
    protected function getRules()
    {
        return Model::getRules();
    }
    public function render()
    {
        return view('livewire.form.invoice');
    }


}
