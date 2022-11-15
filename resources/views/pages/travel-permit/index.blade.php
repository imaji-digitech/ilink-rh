<x-admin>
    <x-slot name="title">
        Data surat jalan
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if( config('app.name', 'Laravel')=='Laravel' )
                    <a href="{{ route('travel-permit.create') }}" class="btn btn-primary">Tambah data surat jalan</a>
                    @endif
                    <livewire:table.main name="travel-permit"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
