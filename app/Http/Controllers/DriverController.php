<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(){
        return view('pages.driver.index');
    }
    public function create(){
        return view('pages.driver.create');
    }
    public function edit($id){
        return view('pages.driver.edit',compact('id'));
    }
    public function show($id){
        return view('pages.driver.show',compact('id'));
    }
}
