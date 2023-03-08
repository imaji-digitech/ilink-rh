<x-admin>
    <x-slot name="title">
        Data driver
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
{{--                    @if(config('app.name', 'Laravel')=='Laravel')--}}
                    <a href="{{ route('driver.create') }}" class="btn btn-primary">Tambah data driver</a>
{{--                    @endif--}}
                    <livewire:table.main name="driver"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
