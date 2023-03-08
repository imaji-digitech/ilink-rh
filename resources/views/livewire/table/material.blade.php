<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        # @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('material_type_id')" role="button" href="#">
                        Jenis material @include('components.sort-icon', ['field' => 'material_type_id'])
                    </a></th>

                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Material @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->materialType->title }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ thousand_format($data->stock) }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('material.show',$data->id) }}" class="btn btn-secondary">Riwayat mutasi</a>
{{--                        @if(config('app.name', 'Laravel')=='Laravel')--}}
                            <a href="{{ route('material.mutation.create',$data->id) }}"
                               class="btn btn-primary">Mutasi</a>
                            <a href="{{ route('material.edit',$data->id) }}" class="btn btn-danger">Ubah</a>
{{--                        @endif--}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

