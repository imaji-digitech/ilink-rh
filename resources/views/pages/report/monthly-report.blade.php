<x-admin>
    <x-slot name="title">
        Report bulan {{month_name($month)}} {{$year}}
    </x-slot>
    <div>
        <div class="container-fluid">
            <livewire:dashboard-data date="1-{{$month}}-{{$year}}"/>
            <livewire:dashboard-table date="1-{{$month}}-{{$year}}"/>
        </div>
    </div>
</x-admin>
