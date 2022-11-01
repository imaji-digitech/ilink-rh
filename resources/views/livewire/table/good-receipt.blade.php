<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #@include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Nomer penerimaan barang</th>
                <th>Pengirim</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
{{--                    'user_id', 'good_receipt_number', 'sender', 'condition',--}}
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->good_receipt_number }}</td>
                    <td>{{ $data->sender }} </td>
                    <td>{{ $data->condition }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('good-receipt.show',$data->id) }}" class="btn btn-primary">detail</a>
                        <a href="{{ route('good-receipt.download',$data->id) }}" class="btn btn-success">Unduh</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

