<x-admin>
    <x-slot name="title">
        Buat data invoice
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">{{__('Invoice')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.invoice action="create"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
