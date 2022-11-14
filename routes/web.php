<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\GoodReceiptController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TravelPermitController;
use App\Models\GoodReceipt;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\MaterialMutation;
use App\Models\Receipt;
use App\Models\Report;
use App\Models\TravelPermit;
use GuzzleHttp\Client;
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
Route::get('test/{a}', function ($a) {
    dd($a);
});

Route::post('/summernote', [SupportController::class, 'upload'])->name('summernote');
Route::middleware(['auth:sanctum',])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('driver', DriverController::class)->only('index', 'create', 'edit', 'show');

    Route::resource('material', MaterialController::class)->only('index', 'create', 'edit', 'show');
    Route::get('/material/mutation/{id}', [MaterialController::class, 'mutationMaterial'])->name('material.mutation.create');
    Route::get('/material-mutation/', [MaterialController::class, 'mutation'])->name('material-mutation');
    Route::get('/material-mutation/create', [MaterialController::class, 'mutationCreate'])->name('material-mutation.create');

    Route::resource('invoice', InvoiceController::class)->only('index', 'create', 'edit', 'show');
    Route::resource('receipt', ReceiptController::class)->only('index', 'create', 'edit', 'show');

    Route::resource('good-receipt', GoodReceiptController::class)->only('index', 'create', 'edit', 'show');
    Route::get('/good-receipt/good-mutation/{id}/status/{status}', [GoodReceiptController::class, 'mutation'])->name('good-receipt.mutation');
    Route::get('/good-receipt/download/{id}', [GoodReceiptController::class, 'download'])->name('good-receipt.download');

    Route::resource('travel-permit', TravelPermitController::class)->only('index', 'create', 'edit', 'show');
    Route::get('/travel-permit/download/{id}', [TravelPermitController::class, 'download'])->name('travel-permit.download');

    Route::get('/receipt/download/{id}', function ($id) {
        $receipt = Receipt::findOrFail($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.receipt', compact('receipt'))->setPaper('a4');
        return $pdf->stream('nota-pembayaran-' . $receipt->receipt_number . '-' . $receipt->created_at->format('d-m-Y') . '.pdf');
    })->name('receipt.download');


    Route::get('/report/monthly/{month}/{year}', function ($month, $year) {
        return view('pages.report.monthly-report', compact('month', 'year'));
    })->name('report.monthly');

    Route::get('report', function () {
        return view('pages.report.index');
    })->name('report.index');

    Route::get('report', function () {
        return view('pages.report.index');
    })->name('report.index');

    Route::get('report/create', function () {
        return view('pages.report.create');
    })->name('report.create');




    Route::get('testing', function () {


    });


});
