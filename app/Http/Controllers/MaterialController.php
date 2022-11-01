<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){
        return view('pages.material.index');
    }
    public function create(){
        return view('pages.material.create');
    }
    public function edit($id){
        return view('pages.material.edit',compact('id'));
    }
    public function show($id){
        $material= Material::findOrFail($id);
        return view('pages.material.show',compact('material'));
    }
    public function mutationCreate(){
        return view('pages.material.mutation');
    }
    public function mutation(){
        return view('pages.material-mutation.index');
    }

    public function mutationMaterial($id){
        return view('pages.material.mutation-create',compact('id'));
    }
}
