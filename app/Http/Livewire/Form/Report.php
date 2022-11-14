<?php

namespace App\Http\Livewire\Form;

use Exception;
use GuzzleHttp\Client;
use Livewire\Component;

class Report extends Component
{
    public $note;
    public function create()
    {
        $client = new Client();
        try {
            $report = \App\Models\Report::create(['user_id' => auth()->id(), 'note' => $this->note,]);
            $material = \App\Models\Material::get();
            $travel = \App\Models\TravelPermit::whereReportId(null);
            $invoice = \App\Models\Invoice::whereReportId(null);
            $good = \App\Models\GoodReceipt::whereReportId(null);
            $receipt = \App\Models\Receipt::whereReportId(null);
            $mutation = \App\Models\MaterialMutation::whereReportId(null);
            $array = [
                'report' => $report->toArray(),
                'material' => $material->toArray(),
                'travel-permit' => $travel->with('travelPermitDetails')->get()->toArray(),
                'invoice' => $invoice->with('invoiceDetails')->get()->toArray(),
                'good' => $good->with('goodReceiptDetails')->get()->toArray(),
                'receipt' => $receipt->with('receiptDetails')->get()->toArray(),
                'mutation' => $mutation->get()->toArray(),
            ];
            $travel->update(['report_id' => $report->id]);
            $invoice->update(['report_id' => $report->id]);
            $good->update(['report_id' => $report->id]);
            $receipt->update(['report_id' => $report->id]);
            $mutation->update(['report_id' => $report->id]);
            $encode = json_encode($array);
            $request = $client->post("http://recycle-hub.imajisociopreneur.id/api/report",
                array(
                    'form_params' => array(
                        'log' => $encode,
                    )
                )
            );
            $response = $request->getBody();
//            return 'ok';
            $this->emit('swal:alert', [
                'type' => 'success',
                'title' => 'Data berhasil ditambahkan',
                'timeout' => 3000,
                'icon' => 'success'
            ]);
            $this->emit('redirect', route('material.index'));
        } catch (Exception $e) {
            $this->emit('swal:alert', [
                'type' => 'error',
                'title' => 'Data tidak berhasil',
                'timeout' => 3000,
                'icon' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.form.report');
    }
}
