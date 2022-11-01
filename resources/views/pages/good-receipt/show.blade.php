<x-admin>
    <x-slot name="title">
        Isi data kwitansi
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('receipt.index') }}">{{__('receipt')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.receipt-detail :receipt-id="$id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
