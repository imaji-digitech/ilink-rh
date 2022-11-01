<?php

namespace App\Http\Livewire\Form;

use App\Models\TravelPermitDetail;
use Livewire\Component;
use App\Models\ReceiptDetail as Model;

class ReceiptDetail extends Component
{
    public $data;
    public $receiptId;
    public $receipt;

    public function mount(){
        $this->setData();

    }
    public function setData(){
        $this->data= form_model(Model::class);
        $this->data['receipt_id']=$this->receiptId;
        $this->receipt= \App\Models\Receipt::find($this->receiptId);
    }
    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Model::create($this->data);
        $this->setData();
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }
    protected function getRules()
    {
        return Model::getRules();
    }

    public function render()
    {
        return view('livewire.form.receipt-detail');
    }
}
