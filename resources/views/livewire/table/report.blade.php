<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th rowspan="2" style="vertical-align: middle"><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        dilaporkan pada @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th style="vertical-align: middle" rowspan="2">Catatan</th>
                <th colspan="5" style="text-align: center">Jumlah pelaporan</th>
            </tr>
            <tr>
                <th style="width: 10px">Mutasi material</th>
                <th style="width: 10px">Invoice</th>
                <th style="width: 10px">Kwitansi</th>
                <th style="width: 10px">Barang masuk</th>
                <th style="width: 10px">Surat Jalan</th>
                <th style="width: 30px">Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $data->created_at->format('i:H d-m-Y') }}</td>
                    <td>{{ $data->note }}</td>
                    <td>{{ $data->materialMutations->count() }}</td>
                    <td>{{ $data->invoices->count() }}</td>
                    <td>{{ $data->receipts->count() }}</td>
                    <td>{{ $data->goodReceipts->count() }}</td>
                    <td>{{ $data->travelPermits->count() }}</td>
                    <td>
                        <div class="row">
{{--                            @if(config('app.name', 'Laravel')=='Laravel')--}}
                            @if(auth()->user()->role==1)
                            <a href="#" wire:click="report({{ $data->id }})" class="btn-primary btn mb-1">Report  <i class="fa fa-retweet"></i> </a>
                                <a href="#" wire:click="deleteItem({{ $data->id }})"
                                   class="btn btn-danger m-1 col">Hapus</a>
                            @endif
                            <a href="{{ route('report.show',$data->id) }}" class="btn-secondary btn">Detail</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

