<x-admin>
    <x-slot name="title">
        Report Recycle Hub {{ $report->created_at->format('d M Y') }}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4>Mutasi Barang</h4>
                    </div>
                    <div class="card-body">
                        {{--                        ['id','material_id', 'user_id', 'mutation_status_id', 'report_id', 'amount', 'note', 'created_at', 'updated_at'];--}}
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>Nama material</td>
                                <td>jenis mutasi</td>
                                <td>jumlah</td>
                                <td>Catatan</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data->mutation as $mutation)
                                <tr>
                                    <td>{{ \App\Models\Material::find($mutation->material_id) }}</td>
                                    <td>{{ \App\Models\MutationStatus::find($mutation->mutation_status_id) }}</td>
                                    <td>{{ $amount }}</td>
                                    <td>{{ $note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
