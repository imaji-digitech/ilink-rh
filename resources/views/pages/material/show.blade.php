<x-admin>
    <x-slot name="title">
        Data mutasi material
    </x-slot>

    <div class="container-fluid">

        <div class="row">
            <div class="card">

                <div class="card-body">
                    <h6>Nama Material : {{ $material->name }}</h6>
                    <h6>Stock : {{ thousand_format($material->stock) }}</h6>
                    <h6>Peruabahan terakhir : {{ $material->updated_at }}</h6>
                    <h6>Catatan : {!! $material->note !!}</h6>
                    <br>
                    <livewire:table.main name="material-mutation" :data-id="$material->id"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
