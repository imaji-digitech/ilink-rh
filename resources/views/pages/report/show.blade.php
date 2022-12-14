@php use App\Models\Material; @endphp
@php use App\Models\MutationStatus; @endphp
<x-admin>
    <x-slot name="title">
        Report Recycle Hub {{ $report->created_at->format('d M Y') }}
    </x-slot>
    <div>
        <div class="container-fluid">

            <div class="card">
                <div class="card-header" style="padding: 10px">
                    <h4>Mutasi Barang</h4>
                </div>
                <div class="card-body" style="padding: 10px">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td><b>Nama material</b></td>
                            <td><b>Mutasi</b></td>
                            <td><b>Jumlah</b></td>
                            <td><b>Catatan</b></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($report->materialMutations as $mutation)
                            <tr>
                                <td>{{ Material::find($mutation->material_id)->name }}</td>
                                <td>{{ MutationStatus::find($mutation->mutation_status_id)->title }}</td>
                                <td>{{ $mutation->amount }}</td>
                                <td>{{ $mutation->note }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card">
                <div class="card-header" style="padding: 10px">
                    <h4>Mutasi Barang</h4>
                </div>
                <div class="card-body" style="padding: 10px">

                </div>

            </div>
        </div>

</x-admin>
