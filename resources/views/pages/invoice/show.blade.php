<x-admin>
    <x-slot name="title">
         Detail invoice
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">{{__('Invoice')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Keterangan  : {{ $invoice->note }}</h6>
                        <h6>PIC : {{ $invoice->user->name }}</h6>
                        <h6>Nomer Invoice : {{ $invoice->invoice_number }}</h6>
                        <h6>Nomer Akuntasi : {{ $invoice->account_number }}</h6>
                        <h6>Perusahaan : {{ $invoice->company }}</h6>
                        <h6>Dilaporkan pada : {{ $invoice->created_at!=$invoice->updated_at?$invoice->updated_at:'-' }}</h6>
                        <br>
                        <livewire:form.invoice-detail :invoiceId="$invoice->id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
