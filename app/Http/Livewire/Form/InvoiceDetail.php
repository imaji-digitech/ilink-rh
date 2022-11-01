<?php

namespace App\Http\Livewire\Form;

use App\Models\InvoiceDetail as Model;
use Livewire\Component;

class InvoiceDetail extends Component
{
    public $data;
    public $invoiceId;
    public $dataId;
    public $invoice;

    public function mount()
    {
        $this->setData();
    }
    protected function getRules()
    {
        return Model::getRules();
    }

    public function setData()
    {
        $this->data = form_model(Model::class, $this->dataId);
        $this->data['invoice_id']=$this->invoiceId;
        $this->invoice = \App\Models\Invoice::find($this->invoiceId);
    }
    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Model::create($this->data);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->setData();
    }
    public function delete($id){

        Model::find($id)->delete();
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
        return view('livewire.form.invoice-detail');
    }
}
