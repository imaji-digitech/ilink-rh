<x-admin>
    <x-slot name="title">
        Data material
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            @if(auth()->user()->role==1)
            <div class="card">
                <div class="card-body">
                    <livewire:make-report-material-mutation/>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    @if(auth()->user()->role==1)
                    <a href="{{ route('material-mutation.create') }}" class="btn btn-primary">Mutasi material</a>
                    @endif
                    <livewire:table.main name="material-mutation-all"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
