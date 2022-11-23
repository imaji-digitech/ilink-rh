<?php

namespace App\Http\Livewire\Table;

use App\Models\GoodReceipt;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\MaterialMutation;
use App\Models\Receipt;
use App\Models\Report;
use App\Models\TravelPermit;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\Case_;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $modelId;
    public $dataId;
    public $data;

    public $perPage = 10;
    public $sortField = "created_at";
    public $sortAsc = false;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ["deleteItem" => "deleteItem", 'delete' => 'delete'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deleteItem($id)
    {
//        dd("asdad");
        $this->data = $this->model::find($id);

        if (!$this->data) {
            $this->emit("deleteResult", ["status" => false, "message" => "Gagal menghapus data " . $this->name]);
            return;
        }
        $this->emit('swal:confirm', [
            'icon' => 'warning',
            'title' => 'apakah anda yakin ingin menghapus data ini',
            'confirmText' => 'Hapus',
            'method' => 'delete'
        ]);

    }

    public function delete()
    {
        $this->data->delete();
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menghapus data',
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'driver':
                $this->model=Driver::class;
                $data = Driver::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.driver', "datas" => $data,];
                break;
            case 'good-receipt':
                $this->model=GoodReceipt::class;
                $data = GoodReceipt::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.good-receipt', "datas" => $data,];
                break;
            case 'material':
                $this->model=Material::class;
                $data = Material::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.material', "datas" => $data,];
                break;
            case 'material-mutation':
                $this->model=MaterialMutation::class;
                $data = MaterialMutation::whereMaterialId($this->dataId)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.material-mutation', "datas" => $data,];
                break;
            case 'material-mutation-all':
                $this->model=MaterialMutation::class;
                $data = MaterialMutation::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.material-mutation-all', "datas" => $data,];
                break;
            case 'invoice':
                $this->model=Invoice::class;
                $data = Invoice::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.invoice', "datas" => $data,];
                break;
            case 'receipt':
                $this->model=Receipt::class;
                $data = Receipt::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.receipt', "datas" => $data,];
                break;
            case 'travel-permit':
                $this->model=TravelPermit::class;
                $data = TravelPermit::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.travel-permit', "datas" => $data,];
                break;
            case 'report':
                $this->model=Report::class;
                $data = Report::search($this->search)->orderBy($this->sortField,$this->sortAsc? 'asc' : 'desc')->paginate($this->perPage);
                return ['view'=>'livewire.table.report','datas'=>$data];
                break;
            default:
                # code...
                break;
        }
    }
}
