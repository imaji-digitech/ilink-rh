<?php

namespace App\Http\Livewire\Form;

use App\Models\Material;
use App\Models\MaterialMutation as Model;
use App\Models\MutationStatus;
use Carbon\Carbon;
use Livewire\Component;

class MaterialMutation extends Component
{
    public $action;
    public $data;
    public $dataId;
    public $materialId;
    public $optionMaterial;
    public $optionStatus;
    public $date;

    public function mount()
    {
        $this->optionMaterial = [];
        foreach (Material::get() as $detail) {
            $this->optionMaterial[] = ['title' => $detail->name, 'value' => $detail->id];
        }
        $this->optionStatus = eloquent_to_options(MutationStatus::get());
        $this->data = form_model(Model::class, $this->dataId);
        $this->data['user_id'] = auth()->id();
        if ($this->materialId != null) {
            $this->data['material_id'] = $this->materialId;
        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['created_at'] = $this->date . ' ' . Carbon::now()->format('H:i');
        Model::create($this->data);
//        $this->presence['created_at'] = $this->presenceTime['date'] . ' ' . $this->presenceTime['time'];
        $material = Material::find($this->data['material_id']);
        $mutation = MutationStatus::find($this->data['mutation_status_id']);
        $material->update(['stock' => $material->stock + ($mutation->indicator * $this->data['amount'])]);
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
        $this->data['created_at'] = $this->date . ' ' . Carbon::now()->format('H:i');
        $this->data['updated_at'] = $this->date . ' ' . Carbon::now()->format('H:i');

        $datas = Model::find($this->dataId);
        $material = Material::find($datas->material_id);
        $mutation = MutationStatus::find($datas->mutation_status_id);
        $material->update(['stock' => $material->stock - ($mutation->indicator * $datas->amount)]);

        $this->data['report_id'] = null;
        $datas->update($this->data);
        $material = Material::find($this->data['material_id']);
        $mutation = MutationStatus::find($this->data['mutation_status_id']);
        $material->update(['stock' => $material->stock + ($mutation->indicator * $this->data['amount'])]);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil diubah',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('material.index'));
    }

    public function render()
    {
        return view('livewire.form.material-mutation');
    }

    protected function getRules()
    {
        return Model::getRules();
    }
}
