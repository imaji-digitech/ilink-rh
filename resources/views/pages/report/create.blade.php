@php
    use App\Models\GoodReceipt;use App\Models\Invoice;use App\Models\MaterialMutation;use App\Models\Receipt;use App\Models\Report;use App\Models\TravelPermit;use Carbon\Carbon;
    $last=Report::orderByDesc('id')->first()
@endphp
<x-admin>
    <x-slot name="title">
        Report Recycle Hub
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5>Note : {{ $last?$last->created_at:'belum pernah melaporkan'}}</h5>
                        <h5>Hal yang belum dilaporkan</h5>
                        <div class="row">
                            <div class="col-6">
                                <h6>Material mutasi : {{ MaterialMutation::whereReportId(null)->count() }}</h6>
                                <h6>Kirim barang : {{ TravelPermit::whereReportId(null)->count() }}</h6>
                                <h6>Terima barang : {{ GoodReceipt::whereReportId(null)->count() }}</h6>
                            </div>
                            <div class="col-6">
                                <h6>Invoice : {{ Invoice::whereReportId(null)->count() }}</h6>
                                <h6>Kwitansi : {{ Receipt::whereReportId(null)->count() }}</h6>
                            </div>
                        </div>
                        <br>
{{--                        <a href="{{ route('invoice.create') }}" class="btn btn-primary">Tambah data invoice</a>--}}
                        <livewire:form.report />
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin>
