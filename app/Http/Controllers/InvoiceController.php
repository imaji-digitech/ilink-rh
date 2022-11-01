<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

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
}
