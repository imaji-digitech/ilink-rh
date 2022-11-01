<x-admin>
    <x-slot name="title">
        Isi data tanda terima barang
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('good-receipt.index') }}">{{__('tanda terima barang')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.good-receipt-detail :receipt-id="$id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
