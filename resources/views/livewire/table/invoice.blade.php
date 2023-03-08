<div>
    <x-data-table :model="$datas">
        <x-slot name="head">
            <tr>
{{--                'user_id', 'invoice_status_id', 'invoice_number', 'account_number', 'company', 'note',--}}
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        #@include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        PIC @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th>Status pembayaran</th>
                <th>Invoice number / Account number</th>
                <th>Perusahaan</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($datas as $index=>$data)
                <tr class="@if($loop->odd)bg-white @else bg-gray-100 @endif">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->invoiceStatus->title }}</td>
                    <td>{{ $data->invoice_number }} / {{ $data->account_number }}</td>
                    <td>{{ $data->company }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('invoice.show',$data->id) }}" class="btn btn-primary">detail</a>
                        <a href="{{ route('invoice.download',$data->id) }}" class="btn btn-primary">Download</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

