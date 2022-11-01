<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelPermitController extends Controller
{
    public function index(){
        return view('pages.travel-permit.index');
    }
    public function create(){
        return view('pages.travel-permit.create');
    }
    public function edit($id){
        return view('pages.travel-permit.edit',compact('id'));
    }
    public function show($id){
        return view('pages.travel-permit.show',compact('id'));
    }
}
