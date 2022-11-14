<?php

namespace App\Http\Controllers;

use App\Models\TravelPermit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    public function download($id){
        $permit= TravelPermit::find($id);
        $pdf = App::make('dompdf.wrapper');
        setlocale(LC_ALL, 'IND');
        $pdf->loadView('pdf.travel-permit',compact('permit'))->setPaper('a4');
        return $pdf->stream('nota-pembayaran.pdf');
    }
}
