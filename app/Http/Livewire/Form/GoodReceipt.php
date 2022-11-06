<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\GoodReceipt as Model;

class GoodReceipt extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $optionInvoiceStatus;

    public function mount()
    {
        $this->data = form_model(Model::class, $this->dataId);
        if ($this->dataId == null) {
            $this->data['user_id'] = auth()->id();
        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['good_receipt_number']=Model::getCode($this->data['created_at']);
        Model::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('good-receipt.index'));
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
        $this->emit('redirect', route('good-receipt.index'));
    }
    protected function getRules()
    {
        return Model::getRules();
    }
    public function render()
    {
        return view('livewire.form.good-receipt');
    }
}
