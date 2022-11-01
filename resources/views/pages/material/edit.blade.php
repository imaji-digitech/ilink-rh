<x-admin>
    <x-slot name="title">
        Ubah data material
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('material.index') }}">{{__('material')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.material action="update" :dataId="$id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
