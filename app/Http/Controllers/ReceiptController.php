<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(){
        return view('pages.receipt.index');
    }
    public function create(){
        return view('pages.receipt.create');
    }
    public function edit($id){
        return view('pages.receipt.edit',compact('id'));
    }
    public function show($id){
        return view('pages.receipt.show',compact('id'));
    }
}
