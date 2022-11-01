<x-admin>
    <x-slot name="title">
        Data tanda terima barang
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('good-receipt.create') }}" class="btn btn-primary">Tambah data tanda terima barang</a>
                    <livewire:table.main name="good-receipt"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
