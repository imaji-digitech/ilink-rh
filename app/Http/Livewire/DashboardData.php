<?php

namespace App\Http\Livewire;

use App\Models\GoodReceipt;
use App\Models\Invoice;
use App\Models\MutationStatus;
use App\Models\Receipt;
use App\Models\TravelPermit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardData extends Component
{
    public $generalData;
    public $mutationData;
    public $mutationDataThisMonth;
    public $mutation;

    public $ioMutation;
    public $productionMutation;
    public $dateList;

    public $dataTable;
    public $weekNow = 1;

    public $now;
    public $date;


    public function mount()
    {
        if ($this->date == null) {
            $this->now = Carbon::now();
        } else {
            $this->now = Carbon::parse($this->date);
        }

        $this->getIoMutation();
        $this->getProductionMutation();
        $this->getGeneralData();
        $this->getPieData();
    }

    public function getIoMutation()
    {
        $now = $this->now;
        $this->ioMutation = [];
        $temp = get_date_on_month();
        $this->ioMutation['category'] = $temp[0];
        $this->ioMutation['data'][] = $temp[1];
        $this->ioMutation['data'][] = $temp[1];
        $this->ioMutation['title'][] = 'Barang masuk';
        $this->ioMutation['title'][] = 'Barang keluar';

        $query = "SELECT DAY(created_at) as date, SUM(amount) as value
FROM material_mutations
WHERE mutation_status_id=4 AND
      MONTH(created_at)=$now->month
GROUP BY day(created_at)";

        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->ioMutation['data'][0][$t->date] = $t->value;
        }

        $query = "SELECT DAY(created_at) as date, SUM(amount) as value
FROM material_mutations
WHERE mutation_status_id=5 AND
      MONTH(created_at)=$now->month
GROUP BY day(created_at)";
        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->ioMutation['data'][1][$t->date] = $t->value;
        }
    }

    public function getProductionMutation()
    {
        $now = $this->now;
        $this->productionMutation = [];
        $temp = get_date_on_month();
        $this->productionMutation['category'] = $temp[0];
        $this->productionMutation['data'][] = $temp[1];
        $this->productionMutation['data'][] = $temp[1];
        $this->productionMutation['data'][] = $temp[1];
        $this->productionMutation['title'][] = 'Barang diproses';
        $this->productionMutation['title'][] = 'Barang Jadi';
        $this->productionMutation['title'][] = 'Residu';

        $query = "SELECT DAY(created_at) as date, SUM(amount) as value
FROM material_mutations
WHERE mutation_status_id=1 AND
      MONTH(created_at)=$now->month
GROUP BY day(created_at)
";
        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->productionMutation['data'][0][$t->date] = $t->value;
        }

        $query = "SELECT DAY(created_at) as date, SUM(amount) as value
FROM material_mutations
WHERE mutation_status_id=2 AND
      MONTH(created_at)=$now->month
GROUP BY day(created_at)
";
        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->productionMutation['data'][1][$t->date] = $t->value;
        }
        $query = "SELECT DAY(created_at) as date, SUM(amount) as value
FROM material_mutations
WHERE mutation_status_id=3 AND
      MONTH(created_at)=$now->month
GROUP BY day(created_at)
";
        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->productionMutation['data'][2][$t->date] = $t->value;
        }
    }

    public function getGeneralData()
    {
        $now = $this->now;
        $this->generalData['travel_permit']
            = TravelPermit::whereMonth('created_at', $now->month)->count();
        $this->generalData['receipt'] = Receipt::whereMonth('created_at', '=',
            $now->month)->count();
        $this->generalData['invoice'] = Invoice::whereMonth('created_at',
            $now->month)->count();
        $this->generalData['good_receipt']
            = GoodReceipt::whereMonth('created_at', $now->month)->count();
    }

    public function getPieData()
    {
        $this->mutation = [];
        $now = $this->now;
        $query
            = "SELECT title, (SELECT sum(amount) FROM material_mutations WHERE mutation_status_id=ms.id) as value FROM mutation_statuses as ms";
        $this->mutationData = DB::select(DB::raw($query));
        $query
            = "SELECT title, (SELECT sum(amount) FROM material_mutations WHERE mutation_status_id=ms.id and MONTH(created_at)=$now->month) as value FROM mutation_statuses as ms";
        $this->mutationDataThisMonth = DB::select(DB::raw($query));
        foreach (MutationStatus::get() as $ms) {
            $query = "SELECT materials.name as title, SUM(material_mutations.amount) as value
FROM `material_mutations`
JOIN materials ON material_mutations.material_id=materials.id
WHERE mutation_status_id=$ms->id AND MONTH(material_mutations.created_at)=$now->month
GROUP BY materials.name";
            $this->mutation[$ms->id]['data'] = DB::select(DB::raw($query));
            $this->mutation[$ms->id]['title'] = $ms->title;
        }
    }

    public function render()
    {
        return view('livewire.dashboard-data');
    }
}
