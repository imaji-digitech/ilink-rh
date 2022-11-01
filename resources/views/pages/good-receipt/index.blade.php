<x-admin>
    <x-slot name="title">
        Data receipt
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('receipt.create') }}" class="btn btn-primary">Tambah data kwitansi</a>
                    <livewire:table.main name="receipt"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
