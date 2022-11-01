<form wire:submit.prevent="{{$action}}">
{{--    <x-form.select :options="$optionDriver" :selected="$data['driver_id']" title="Nama driver" model="data.driver_id"/>--}}

    <x-form.input type="text" title="Perusahaan " model="data.company"/>
    <x-form.input type="text" title="Nomer invoice" model="data.invoice_number"/>
    <x-form.input type="text" title="Nomer accounting" model="data.account_number"/>

    <x-form.input type="text" title="No HP Perusahaan dituju" model="data.no_phone"/>
    <x-form.select :options="$optionInvoiceStatus" :selected="$data['invoice_status_id']" title="Status tagihan" model="data.invoice_status_id"/>
    <x-form.textarea title="Keterangan tambahan" model="data.note"/>

    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
