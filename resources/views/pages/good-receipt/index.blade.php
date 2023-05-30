<x-admin>
    <x-slot name="title">
        Data tanda terima barang
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
{{--                    @if(config('app.name', 'Laravel')=='Laravel')--}}
{{--                    @if(auth()->user()->role==1)--}}
                    <a href="{{ route('good-receipt.create') }}" class="btn btn-primary">Tambah data tanda terima barang</a>
{{--                    @endif--}}
                    <livewire:table.main name="good-receipt"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
