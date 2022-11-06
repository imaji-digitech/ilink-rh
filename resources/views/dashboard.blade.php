<x-admin>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div>
        <div class="container-fluid">
            @livewire('dashboard-data')
            @livewire('dashboard-table')
        </div>
    </div>
</x-admin>
