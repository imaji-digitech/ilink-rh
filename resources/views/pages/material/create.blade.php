<x-admin>
    <x-slot name="title">
        Buat data driver
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">{{__('Driver')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.driver action="create"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
