<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Dibuat pada @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Nomer</th>
                <th>Pengirim</th>
                <th>Kondisi</th>
                <th>Status surat</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>
                        {{ $data->created_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->good_receipt_number }}</td>
                    <td>{{ $data->sender }} </td>
                    <td>{{ $data->condition }}</td>
                    <td>{{ $data->good_receipt_mutation_id!=null ? $data->goodReceiptMutation->title:'Belum selesai' }} </td>
                    <td class="whitespace-no-wrap row-action--icon" style="width: 29%">
                        <div class="row">
                            @if(config('app.name', 'Laravel')=='Laravel')
                                <a href="{{ route('good-receipt.edit',$data->id) }}"
                                   class="btn btn-dark m-1 col">Ubah</a>
                                <a href="{{ route('good-receipt.show',$data->id) }}" class="btn btn-primary m-1 col">Detail</a>
                            @endif
                            <a href="{{ route('good-receipt.download',$data->id) }}"
                               class="btn btn-success m-1 col" target="_blank">
                                Unduh
                            </a>
                            @if(config('app.name', 'Laravel')=='Laravel')
                                @if($data->good_receipt_mutation_id==null)
                                    <a href="{{ route('good-receipt.mutation',[$data->id,1]) }}"
                                       class="btn btn-danger m-1 col">Selesai</a>
                                    <a href="{{ route('good-receipt.mutation',[$data->id,2]) }}"
                                       class="btn btn-secondary m-1 col">Selesai & Mutasi</a>
                                    <a href="#" wire:click="deleteItem({{ $data->id }})"
                                       class="btn btn-danger m-1 col">Hapus</a>
                                @endif
                            @endif
                        </div>

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

