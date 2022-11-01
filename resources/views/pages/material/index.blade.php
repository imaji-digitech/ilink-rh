<x-admin>
    <x-slot name="title">
        Data material
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('material.create') }}" class="btn btn-primary">Tambah data material</a>
                    <livewire:table.main name="material"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
