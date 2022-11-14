<?php

namespace App\Http\Controllers;

use App\Models\GoodReceipt;
use App\Models\Material;
use App\Models\MaterialMutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    public function mutation($id,$status){
        $receipt = GoodReceipt::find($id);
        $receipt->update(['good_receipt_mutation_id'=>$status]);
        if ($status==2){
            foreach ($receipt->goodReceiptDetails as $grd){
                $material = Material::find($grd->material_id);
                MaterialMutation::create([
                    'material_id' => $material->id,
                    'user_id' => auth()->id(),
                    'mutation_status_id' => 4,
                    'amount' => $grd->quantity,
                    'note' => "barang dari $receipt->good_receipt_number"
                ]);
                $material->update(['stock'=>$material->stock+$grd->quantity]);
            }
        }
        return redirect()->route('good-receipt.index');
    }
    public function download ($id){
        $good= GoodReceipt::find($id);
        $pdf = App::make('dompdf.wrapper');
        setlocale(LC_ALL, 'IND');
        $pdf->loadView('pdf.good-receipt',compact('good'))->setPaper('a4');
        return $pdf->stream('tanda-terima-barang-'.$good->receipt_number.'-'.$good->created_at->format('d-m-Y').'.pdf');
    }
}
