<?php

namespace App\Http\Livewire;

use App\Models\GoodReceipt;
use App\Models\Invoice;
use App\Models\MaterialMutation;
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

    public function mount()
    {
        $now = Carbon::now();
        $this->generalData['travel_permit'] = TravelPermit::whereMonth('created_at', $now->month)->count();
        $this->generalData['receipt'] = Receipt::whereMonth('created_at', '=', $now->month)->count();
        $this->generalData['invoice'] = Invoice::whereMonth('created_at', $now->month)->count();
        $this->generalData['good_receipt'] = GoodReceipt::whereMonth('created_at', $now->month)->count();
//        $this->generalData['receipt_out'] = Receipt::whereMonth('created_at', $now->month)
//            ->where('receipt_type_id', 2)->count();
        $query = "SELECT title, (SELECT sum(amount) FROM material_mutations WHERE mutation_status_id=ms.id) as amount FROM mutation_statuses as ms";
        $this->mutationData = DB::select(DB::raw($query));
//        dd($this->mutationData);
//        MaterialMutation::whereMonth('created_at', $now->month)
//            ->groupBy('mutation_status_id')
//            ->selectRaw('sum(amount) as amount, mutation_status_id')
//            ->pluck('amount', 'mutation_status_id');
    }

    public function render()
    {
        return view('livewire.dashboard-data');
    }
}
