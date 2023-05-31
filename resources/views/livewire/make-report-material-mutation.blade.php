<div class="mb-3">
    <div class="row">
        <x-form.input title="Mulai" type="date" model="dateStart"/>
        <x-form.input title="Akhir" type="date" model="dateEnd"/>

            <div class="mb-2 text-danger">
                @if($errorMessage)
                {{ $errorMessage }}
                @endif
            </div>

    </div>

    <button wire:click="download" class="btn btn-primary">Download Report</button>
</div>
