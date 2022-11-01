<form wire:submit.prevent="{{$action}}">
    <x-form.input type="text" title="Nomer kwitansi" model="data.receipt_number"/>
    <x-form.input type="text" title="Nama Perusahaan" model="data.company"/>
    <x-form.input type="text" title="Nama" model="data.name"/>
    <x-form.input type="text" title="No HP Perusahaan dituju" model="data.no_phone"/>
    <x-form.textarea title="Alamat Perusahaan dituju" model="data.address"/>
    <x-form.textarea title="Catatan" model="data.note"/>
{{--    <x-form.select :options="$optionReceiptType" :selected="$data['receipt_type_id']" title="Jenis kwitansi" model="data.receipt_type_id"/>--}}
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
