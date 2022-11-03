<form wire:submit.prevent="{{$action}}">
{{--    <x-form.select :options="$optionDriver" :selected="$data['driver_id']" title="Nama driver" model="data.driver_id"/>--}}
    <x-form.input type="text" title="Nama PIC Perusahaan dituju" model="data.name"/>
    <x-form.input type="text" title="Perusahaan dituju (optional)" model="data.company"/>
    <x-form.input type="text" title="No HP Perusahaan dituju" model="data.no_phone"/>
    <x-form.input type="date" title="Tanggal" model="data.created_at"/>
    <x-form.textarea title="Alamat Perusahaan dituju" model="data.address"/>
    <x-form.input type="text" title="Kendaraan dipakai" model="data.vehicle"/>
    <x-form.input type="text" title="Plat nomor kendaraan dipakai" model="data.vehicle_number"/>
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
