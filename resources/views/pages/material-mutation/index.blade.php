<x-admin>
    <x-slot name="title">
        Data material
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
{{--                    @if(config('app.name', 'Laravel')=='Laravel')--}}
                    <a href="{{ route('material-mutation.create') }}" class="btn btn-primary">Mutasi material</a>
{{--                    @endif--}}
                    <livewire:table.main name="material-mutation-all"/>
                </div>
            </div>
        </div>
    </div>
</x-admin>
