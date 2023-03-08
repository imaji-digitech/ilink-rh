<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #@include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                {{--                <th><a wire:click.prevent="sortBy('receipt_type_id')" role="button" href="#">--}}
                {{--                        Kwitansi @include('components.sort-icon', ['field' => 'receipt_type_id'])--}}
                {{--                    </a></th>--}}
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Penerima</th>
                <th>Alamat</th>
                <th>Dibuat pada</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    {{--                    <td>{{ $data->receiptType->title }}</td>--}}
                    <td>{!!  ($data->company!=null)?$data->company.'<br>':'' !!}
                        {{ "$data->name ($data->no_phone)" }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
{{--                        @if(config('app.name', 'Laravel')=='Laravel')--}}
                            <a href="{{ route('receipt.show',$data->id) }}" class="btn btn-primary m-1">
                                Detail
                            </a>
                            <a href="{{ route('receipt.edit',$data->id) }}" class="btn btn-secondary m-1">
                                Ubah
                            </a>
                            @if($data->report_id==null)
                                <a href="#" wire:click="deleteItem({{$data->id}})" class="btn btn-secondary m-1">
                                    Hapus
                                </a>
                            @endif

{{--                        @endif--}}
                        <a href="{{ route('receipt.download',$data->id) }}" target="_blank" class="btn btn-success m-1">
                            Unduh
                        </a>

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

