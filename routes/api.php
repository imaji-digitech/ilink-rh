<?php

use App\Models\GoodReceipt;
use App\Models\GoodReceiptDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Log;
use App\Models\Material;
use App\Models\MaterialMutation;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\Report;
use App\Models\TravelPermit;
use App\Models\TravelPermitDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('cek', function (Request $request) {
    Log::create(['log' => $request->log]);
});

Route::post('report', function (Request $request) {
    $decode = json_decode($request->report);
    if (Report::find($decode->report->id)!=null){
        return 'report telah dilaporkan';
    }
    $report = (array)$decode->report;
    $report['data']=$request->report;
    $report['created_at']=\Carbon\Carbon::parse($report['created_at'])->addHours(7);
    $report['updated_at']=\Carbon\Carbon::parse($report['updated_at'])->addHours(7);
    Report::create($report);

//        MaterialMutation::create((array)$m);
    foreach ($decode->material as $m) {
        $material = Material::find($m->id);
        if ($material==null){
            Material::create((array)$m);
        }else{
            $material->update(['stock'=>$m->stock, 'note'=>$m->note]);
        }
    }

    foreach ($decode->mutation as $m) {
        $a=(array)$m;
        $a['created_at']=\Carbon\Carbon::parse($a['created_at'])->addHours(7);
        $a['updated_at']=\Carbon\Carbon::parse($a['updated_at'])->addHours(7);
        MaterialMutation::create($a);
    }

    foreach ($decode->good as $m) {
        $a=(array)$m;
        $a['created_at']=\Carbon\Carbon::parse($a['created_at'])->addHours(7);
        $a['updated_at']=\Carbon\Carbon::parse($a['updated_at'])->addHours(7);
        GoodReceipt::create($a);
        foreach ($m->good_receipt_details as $detail) {
            $b=(array)$detail;
            $b['created_at']=\Carbon\Carbon::parse($b['created_at'])->addHours(7);
            $b['updated_at']=\Carbon\Carbon::parse($b['updated_at'])->addHours(7);
            GoodReceiptDetail::create($b);
        }
    }

    foreach ($decode->{'travel-permit'} as $m) {
        $a=(array)$m;
        $a['created_at']=\Carbon\Carbon::parse($a['created_at'])->addHours(7);
        $a['updated_at']=\Carbon\Carbon::parse($a['updated_at'])->addHours(7);
        TravelPermit::create($a);
        foreach ($m->travel_permit_details as $detail) {
            $b=(array)$detail;
            $b['created_at']=\Carbon\Carbon::parse($b['created_at'])->addHours(7);
            $b['updated_at']=\Carbon\Carbon::parse($b['updated_at'])->addHours(7);
            TravelPermitDetail::create($b);
        }
    }

    foreach ($decode->invoice as $m) {
        $a=(array)$m;
        $a['created_at']=\Carbon\Carbon::parse($a['created_at'])->addHours(7);
        $a['updated_at']=\Carbon\Carbon::parse($a['updated_at'])->addHours(7);
        Invoice::create($a);
        foreach ($m->invoice_details as $detail) {
            $b=(array)$detail;
            $b['created_at']=\Carbon\Carbon::parse($b['created_at'])->addHours(7);
            $b['updated_at']=\Carbon\Carbon::parse($b['updated_at'])->addHours(7);
            InvoiceDetail::create($b);
        }
    }

    foreach ($decode->receipt as $m) {
        $a=(array)$m;
        $a['created_at']=\Carbon\Carbon::parse($a['created_at'])->addHours(7);
        $a['updated_at']=\Carbon\Carbon::parse($a['updated_at'])->addHours(7);
        Receipt::create($a);
        foreach ($m->receipt_details as $detail) {
            $b=(array)$detail;
            $b['created_at']=\Carbon\Carbon::parse($b['created_at'])->addHours(7);
            $b['updated_at']=\Carbon\Carbon::parse($b['updated_at'])->addHours(7);
            ReceiptDetail::create($b);
        }
    }
    return "data telah diterima";

});
