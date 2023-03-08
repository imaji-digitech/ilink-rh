<?php

namespace App\Http\Controllers;

use App\Models\GoodReceipt;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class InvoiceController extends Controller
{
    public function index(){
        return view('pages.invoice.index');
    }
    public function create(){
        return view('pages.invoice.create');
    }
    public function edit($id){
        return view('pages.invoice.edit',compact('id'));
    }
    public function show($id){
        $invoice=Invoice::findOrFail($id);
        return view('pages.invoice.show',compact('invoice'));
    }
    public function download($id){
        $invoice= Invoice::find($id);
        $pdf = App::make('dompdf.wrapper');
        setlocale(LC_ALL, 'IND');
        $pdf->loadView('pdf.invoice',compact('invoice'))->setPaper('a4');
        return $pdf->stream('invoice-'.$invoice->invoice_number.'-'.$invoice->created_at->format('d-m-Y').'.pdf');
    }
}
