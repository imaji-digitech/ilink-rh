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
{{--                        @if(config('app.name', 'Laravel')=='Laravel')--}}
                        @if(auth()->user()->role==1)
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

                        <a href="{{ route('report.create') }}" class="btn btn-primary">Tambah data report</a>
                        @endif
                        <livewire:table.report name="report"/>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-3">
                    <h2>Montly Report Recyele Hub</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @for($year=2022; $year<=Carbon::now()->year; $year++)
                            @for($month=1; $month<=12 ; $month++)
                                @if($year==2022)
                                    @if($month>=11 and $month<=Carbon::now()->month)
                                        <div class="p-1 col-md-6">
                                            <a href="{{ route('report.monthly',[$month,$year]) }}"
                                               class="btn btn-secondary" style="width: 100%">{{ $month }}
                                                - {{ $year }}</a>
                                        </div>

                                    @endif
                                @elseif($year=Carbon::now()->year)
                                    @if($month<=Carbon::now()->month)
                                        <a href="" class="btn btn-secondary">{{ $month }} - {{ $year }}</a>
                                    @endif
                                @else
                                    <a href="" class="btn btn-secondary">{{ $month }} - {{ $year }}</a>
                                @endif
                            @endfor
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
