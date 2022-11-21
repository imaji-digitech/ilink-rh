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
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        Kendaraan @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Nama / Perusahaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->vehicle }} / {{ $data->vehicle_number }}</td>
                    <td>{{ $data->name." ($data->no_phone)" }} <br> <b>{{ $data->company }}</b></td>
                    <td>{{ $data->address }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @if(config('app.name', 'Laravel')=='Laravel')
                            <a href="{{ route('travel-permit.show',$data->id) }}" class="btn btn-primary m-1">Detail</a>
                            <a href="{{ route('travel-permit.edit',$data->id) }}" class="btn btn-secondary m-1">Ubah</a>
                        @endif
                        <a href="{{ route('travel-permit.download',$data->id) }}" class="btn btn-success m-1">Unduh</a>

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

