<x-admin>
    <x-slot name="title">
        Ubah data keuangan
    </x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.budget.index') }}">{{__('Keuangan')}}</a></li>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:form.budget action="update" :budgetId="$id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
