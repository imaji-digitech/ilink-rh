<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\GoodReceiptController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TravelPermitController;
use App\Models\GoodReceipt;
use App\Models\Material;
use App\Models\Receipt;
use App\Models\TravelPermit;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::post('/summernote', [SupportController::class, 'upload'])->name('summernote');
Route::middleware(['auth:sanctum',])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('driver',DriverController::class)->only('index','create','edit','show');
    Route::resource('material', MaterialController::class)->only('index','create','edit','show');
    Route::get('/material/mutation/{id}', [MaterialController::class,'mutationMaterial'])->name('material.mutation.create');

    Route::get('/material-mutation/', [MaterialController::class,'mutation'])->name('material-mutation');
    Route::get('/material-mutation/create', [MaterialController::class,'mutationCreate'])->name('material-mutation.create');
    Route::resource('invoice', InvoiceController::class)->only('index','create','edit','show');
    Route::resource('receipt', ReceiptController::class)->only('index','create','edit','show');
    Route::resource('good-receipt', GoodReceiptController::class)->only('index','create','edit','show');
    Route::get('/good-receipt/good-mutation/{id}/status/{status}',function ($id,$status){
        $receipt = GoodReceipt::find($id);
        $receipt->update(['good_receipt_mutation_id'=>$status]);
        if ($status==2){
            foreach ($receipt->goodReceiptDetails as $grd){
                $material = Material::find($grd->material_id);
                \App\Models\MaterialMutation::create([
                    'material_id' => $material->id,
                    'user_id' => auth()->id(),
                    'mutation_status_id' => 4,
                    'amount' => $grd->quantity,
                    'note' => "barang dari $receipt->good_receipt_number"
                    ]);
//                'material_id', 'user_id', 'mutation_status_id', 'report_id', 'amount', 'note',
                $material->update(['stock'=>$material->stock+$grd->quantity]);
            }
        }
        return redirect()->route('good-receipt.index');
    })->name('good-receipt.mutation');
    Route::resource('travel-permit', TravelPermitController::class)->only('index','create','edit','show');
    Route::get('/receipt/download/{id}',function ($id){
        $receipt = Receipt::findOrFail($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.receipt',compact('receipt'))->setPaper('a4');
        return $pdf->stream('nota-pembayaran-'.$receipt->receipt_number.'-'.$receipt->created_at->format('d-m-Y').'.pdf');
    })->name('receipt.download');

    Route::get('/good-receipt/download/{id}',function ($id){
        $good= GoodReceipt::find($id);
        $pdf = App::make('dompdf.wrapper');
        setlocale(LC_ALL, 'IND');
        $pdf->loadView('pdf.good-receipt',compact('good'))->setPaper('a4');
        return $pdf->stream('tanda-terima-barang-'.$good->receipt_number.'-'.$good->created_at->format('d-m-Y').'.pdf');
    })->name('good-receipt.download');

    Route::get('/travel-permit/download/{id}',function ($id){
        $permit= TravelPermit::find($id);
        $pdf = App::make('dompdf.wrapper');
        setlocale(LC_ALL, 'IND');
        $pdf->loadView('pdf.travel-permit',compact('permit'))->setPaper('a4');
        return $pdf->stream('nota-pembayaran.pdf');
    })->name('travel-permit.download');
});
