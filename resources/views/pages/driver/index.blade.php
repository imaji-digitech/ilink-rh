<x-admin>
    <x-slot name="title">
        Data Keuangan
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-12" style="padding: 0">
                                        <livewire:recapitulation-budget/>
                    </div>
{{--                    <br><br>--}}
                    <h4>Saldo Perusahaan : Rp. {{number_format($total,0,',','.')}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Bulan kemarin
                                <br>
                                Jumlah pemasukan : Rp. {{number_format($lastIncome[0]->income,0,',','.')}}
                                <br>
                                Jumlah pengeluaran : Rp. {{number_format($lastOutcome[0]->outcome,0,',','.')}}
                            </h6>
                            {{--                <a href="{{route('admin.budget.last')}}" class="btn btn-primary">Export data bulan kemarin</a>--}}
                        </div>
                        <div class="col-md-6">
                            <h6>
                                Bulan ini
                                <br>
                                Jumlah pemasukan : Rp. {{number_format($income[0]->income,0,',','.')}}
                                <br>
                                Jumlah pengeluaran : Rp. {{number_format($outcome[0]->outcome,0,',','.')}}
                            </h6>
                            {{--                <a href="{{route('admin.budget.now')}}" class="btn btn-primary">Export data bulan ini</a>--}}
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('admin.budget.create') }}">Tambah data</a>
                    <livewire:table.main name="budget" :model="$budget"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
