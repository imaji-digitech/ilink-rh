<x-admin>
    <x-slot name="title">
        Data material
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('material-mutation.create') }}" class="btn btn-primary">Mutasi material</a>
                    <livewire:table.main name="material-mutation-all"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
