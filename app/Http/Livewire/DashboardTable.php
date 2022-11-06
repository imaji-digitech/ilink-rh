<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardTable extends Component
{
    public $weekNow=1;
    public $dataTable;
    public $wm;
    public $first;
    public $lastDay;
    public $lastweek;

    public function mount(){
        $this->dataTable();
        $now= Carbon::now();
        $this->first=$now->firstOfMonth()->dayOfWeek;
        $this->lastDay=$now->lastOfMonth()->dayOfWeek;
        $this->lastweek=$now->lastOfMonth()->weekOfMonth;

    }
    public function setWeekNow($id){
        $this->weekNow=$id;
    }

    public function dataTable()
    {
        $now = Carbon::now();
        $this->dataTable = [];
        $query = "
        SELECT FLOOR((DayOfMonth(material_mutations.created_at)-1)/7)+1 as weeks,
        DAYOFWEEK(material_mutations.created_at) as days,
        SUM(amount) as value,
        m.name,
        material_mutations.mutation_status_id as status
        FROM `material_mutations`
        JOIN materials m on m.id = material_mutations.material_id
        WHERE MONTH(material_mutations.created_at)=$now->month AND YEAR(material_mutations.created_at)=$now->year
        GROUP BY weeks, days,m.name,status
        ORDER BY weeks, days ";
        $temp = DB::select(DB::raw($query));
        foreach ($temp as $t) {
            $this->dataTable[$t->weeks][$t->days][$t->status]['value'][]=$t->value;
            $this->dataTable[$t->weeks][$t->days][$t->status]['name'][]=$t->name;
        }
//        dd($this->dataTable);
    }
    public function render()
    {
        return view('livewire.dashboard-table');
    }
}
