<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #@include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('receipt_type_id')" role="button" href="#">
                        Kwitansi @include('components.sort-icon', ['field' => 'receipt_type_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->receiptType->title }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->no_phone }}</td>
                    <td>{{ $data->address }}</td>
                    <td class="whitespace-no-wrap row-action--icon">

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

