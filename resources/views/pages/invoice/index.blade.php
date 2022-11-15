<x-admin>
    <x-slot name="title">
        Data invoice
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if(config('app.name', 'Laravel')=='Laravel')
                    <a href="{{ route('invoice.create') }}" class="btn btn-primary">Tambah data invoice</a>
                    @endif
                    <livewire:table.main name="invoice"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
