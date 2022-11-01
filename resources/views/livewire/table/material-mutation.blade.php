<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
{{--                'material_id', 'user_id', 'mutation_status_id', 'report_id', 'amount', 'note',--}}
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        # @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('mutation_status_id')" role="button" href="#">
                        Status mutasi @include('components.sort-icon', ['field' => 'mutation_status_id'])
                    </a></th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Dilaporkan pada</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->mutationStatus->title }}</td>
                    <td>{{ thousand_format($data->amount) }}</td>
                    <td>{{ $data->note }}</td>
                    <td>{{ $data->created_at!=$data->updated_at?$data->updated_at:'' }}</td>

                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

