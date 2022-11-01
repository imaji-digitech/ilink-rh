<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        # @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        nama driver @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
                <th>No HP</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->no_phone }}</td>
                    <td>{{ $data->no_ktp }}</td>
                    <td>{{ $data->address }}</td>
                    <td class="whitespace-no-wrap row-action--icon">

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

