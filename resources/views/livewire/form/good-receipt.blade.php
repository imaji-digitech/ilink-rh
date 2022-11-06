<form wire:submit.prevent="{{$action}}">
{{--    <x-form.input type="text" title="Nomer penerimaan barang " model="data.good_receipt_number"/>--}}
    <x-form.input type="text" title="Pengirim" model="data.sender"/>
    <x-form.input type="text" title="Kondisi" model="data.condition"/>
    @if($action=='create')
        <x-form.input type="date" title="Tanggal " model="data.created_at"/>
    @endif


    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
