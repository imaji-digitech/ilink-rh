<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodReceiptController extends Controller
{
    public function index(){
        return view('pages.good-receipt.index');
    }
    public function create(){
        return view('pages.good-receipt.create');
    }
    public function edit($id){
        return view('pages.good-receipt.edit',compact('id'));
    }
    public function show($id){
        return view('pages.good-receipt.show',compact('id'));
    }
}
