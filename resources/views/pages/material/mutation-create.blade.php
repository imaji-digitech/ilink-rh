<x-admin>
    <x-slot name="title">
        Buat data mutasi material
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('material.index') }}">{{__('material')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ \App\Models\Material::find($id)->name }}</h3>
                        <livewire:form.material-mutation action="create" :material-id="$id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
