<x-admin>
    <x-slot name="title">
        Report Bulanan
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @php($months = [7,8,9,10])
                    @foreach($months as $month)
                        Rekap bulan {{ $month }}-2023 <br>
                        Jumlah Barang Masuk : {{ \App\Models\MaterialMutation::where('mutation_status_id','=',4)->whereMonth('created_at',$month)->whereYear('created_at',2023)->get()->sum('amount') }}
                        <br>
                        Jumlah Barang Keluar : {{ \App\Models\MaterialMutation::where('mutation_status_id','=',5)->whereMonth('created_at',$month)->whereYear('created_at',2023)->get()->sum('amount') }}
                        <br>
                        Jumlah Barang Proses : {{ \App\Models\MaterialMutation::where('mutation_status_id','=',1)->whereMonth('created_at',$month)->whereYear('created_at',2023)->get()->sum('amount') }}
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin>
