<?php

namespace App\Http\Livewire\Form;

use App\Models\GoodReceipt;
use App\Models\Material;
use App\Models\TravelPermitDetail;
use Livewire\Component;
use App\Models\GoodReceiptDetail as Model;

class GoodReceiptDetail extends Component
{
    public $data;
    public $receiptId;
    public $receipt;
    public $optionMaterial;

    public function mount(){
        $this->setData();
        $this->optionMaterial=[];
        foreach (Material::get() as $detail){
            $this->optionMaterial[] = ['title' => $detail->name, 'value' => $detail->id];
        }

    }
    public function setData(){
        $this->data= form_model(Model::class);
        $this->data['good_receipt_id']=$this->receiptId;
        $this->receipt= GoodReceipt::find($this->receiptId);
    }

    public function delete($id)
    {
        Model::find($id)->delete();
        $this->setData();
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil dihapus',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
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
        return view('livewire.form.good-receipt-detail');
    }
}
