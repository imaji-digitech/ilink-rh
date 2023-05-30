<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
                {{--                'material_id', 'user_id', 'mutation_status_id', 'report_id', 'amount', 'note',--}}
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        # @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('material_id')" role="button" href="#">
                        Material @include('components.sort-icon', ['field' => 'material_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('mutation_status_id')" role="button" href="#">
                        Status mutasi @include('components.sort-icon', ['field' => 'mutation_status_id'])
                    </a></th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                    <td>{{ $data->material->name }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>
                        {{ $data->mutationStatus->title }}
{{--                        <div class="btn btn-warning">--}}
{{--                            <i class="fas fa-sync"></i>--}}
{{--                        </div>--}}
{{--                        <br><br>--}}
{{--                        <div class="btn btn-success">--}}
{{--                            <i class="fas fa-upload"></i>--}}
{{--                        </div>--}}
{{--                        <br><br>--}}
{{--                        <div class="btn btn-primary">--}}
{{--                            <i class="fas fa-download"></i>--}}
{{--                        </div>--}}

                    </td>
                    <td style="text-align: center">{{ thousand_format($data->amount) }}</td>
                    <td>
                        <div style="width:200px">
                            {{ $data->note }}
                        </div>
                    </td>
{{--                    <td>{{ $data->created_at!=$data->updated_at?$data->updated_at:'' }}</td>--}}
                    <td>
                        <div style="width:100px" class="row">
                        <a href="{{ route('material-mutation.edit',$data->id) }}" class="btn btn-primary col">Ubah</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

