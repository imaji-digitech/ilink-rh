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
        MaterialMutation::create((array)$m);
    }

    foreach ($decode->good as $m) {
        GoodReceipt::create((array)$m);
        foreach ($m->good_receipt_details as $detail) {
            GoodReceiptDetail::create((array)$detail);
        }
    }

    foreach ($decode->{'travel-permit'} as $m) {
        TravelPermit::create((array)$m);
        foreach ($m->travel_permit_details as $detail) {
            TravelPermitDetail::create((array)$detail);
        }
    }

    foreach ($decode->invoice as $m) {
        Invoice::create((array)$m);
        foreach ($m->invoice_details as $detail) {
            InvoiceDetail::create((array)$detail);
        }
    }

    foreach ($decode->receipt as $m) {
        Receipt::create((array)$m);
        foreach ($m->receipt_details as $detail) {
            ReceiptDetail::create((array)$detail);
        }
    }
    return "data telah diterima";

});
